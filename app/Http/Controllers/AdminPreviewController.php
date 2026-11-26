<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\HomeService;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

/**
 * Renderiza la página pública con los datos del formulario sin guardarlos.
 * Los archivos no se suben: el navegador reemplaza las rutas «__preview__/campo»
 * por la imagen elegida localmente.
 */
class AdminPreviewController extends Controller
{
    public function settings(Request $request)
    {
        $values = SiteSetting::fromAdminInput($request->all());

        foreach (['qr_pagos', 'qr_donaciones'] as $field) {
            if ($this->hasNewFile($request, $field)) {
                $values[$field . '_path'] = '__preview__/' . $field;
            } elseif ($request->boolean('remove_' . $field)) {
                $values[$field . '_path'] = '';
            }
        }

        SiteSetting::previewWith($values);

        return $this->landing();
    }

    public function homeService(Request $request, ?HomeService $homeService = null)
    {
        $item = $homeService ?? new HomeService();
        $item->fill($request->only(['section', 'title', 'description', 'link']));
        $item->sort_order = (int) $request->input('sort_order', 0);
        $item->is_active = $request->boolean('is_active');

        if ($this->hasNewFile($request, 'image')) {
            $item->image_path = '__preview__/image';
        } elseif ($request->boolean('remove_image')) {
            $item->image_path = null;
        }

        $rows = $this->withEdited(HomeService::publishedRows(), $item);

        return $this->landing(['homeServices' => HomeService::groupRows($rows)]);
    }

    public function team(Request $request, ?TeamMember $team = null)
    {
        $item = $team ?? new TeamMember();
        $item->fill($request->only(['name', 'initials', 'specialty', 'experience', 'bio']));
        $item->sort_order = (int) $request->input('sort_order', 0);
        $item->is_active = $request->boolean('is_active');

        if ($this->hasNewFile($request, 'photo')) {
            $item->photo_path = '__preview__/photo';
        } elseif ($request->boolean('remove_photo')) {
            $item->photo_path = null;
        }

        $rows = $this->withEdited(TeamMember::published(), $item)
            ->sortBy([['sort_order', 'asc'], ['id', 'asc']])
            ->values();

        return $this->landing(['teamMembers' => $rows]);
    }

    public function banner(Request $request, ?Banner $banner = null)
    {
        $item = $banner ?? new Banner();
        $item->title = (string) $request->input('title', '');

        if ($this->hasNewFile($request, 'image_path')) {
            $item->image_path = '__preview__/image_path';
        }

        return $this->landing(['banners' => $item->image_path ? collect([$item]) : collect()]);
    }

    public function testimonial(Request $request, ?Testimonial $testimonial = null)
    {
        $item = $testimonial ?? new Testimonial();
        $item->fill($request->only(['name', 'detail', 'text', 'avatar_url']));
        $item->rating = max(1, min(5, (int) $request->input('rating', 5) ?: 5));
        $item->is_active = $request->boolean('is_active');

        if ($this->hasNewFile($request, 'file')) {
            $item->file_path = '__preview__/file';
            $item->file_type = (string) $request->input('_preview_types.file', '');
        }

        try {
            $rows = Testimonial::where('is_active', true)->orderBy('created_at', 'desc')->get();
        } catch (\Throwable $e) {
            $rows = collect();
        }

        return $this->landing(['testimonials' => $this->withEdited($rows, $item, true)]);
    }

    private function landing(array $overrides = [])
    {
        View::share('adminPreview', true);

        $data = array_merge(
            app(LandingController::class)->landingData(),
            ['banners' => collect()],
            $overrides
        );

        return response(view('templates.landing', $data)->render())
            ->header('Cache-Control', 'no-store')
            ->header('X-Robots-Tag', 'noindex, nofollow');
    }

    /**
     * Reemplaza (o agrega) el registro editado en la lista publicada y lo marca para resaltarlo.
     */
    private function withEdited(Collection $rows, Model $item, bool $prepend = false): Collection
    {
        $rows = $rows->values();
        $index = $item->exists
            ? $rows->search(fn ($row) => $row->getKey() === $item->getKey())
            : false;

        if (!$item->is_active) {
            return $index === false ? $rows : $rows->except([$index])->values();
        }

        $item->setAttribute('preview_focus', true);

        if ($index !== false) {
            return $rows->put($index, $item);
        }

        return $prepend ? $rows->prepend($item) : $rows->push($item);
    }

    private function hasNewFile(Request $request, string $field): bool
    {
        return in_array($field, (array) $request->input('_preview_files', []), true);
    }
}
