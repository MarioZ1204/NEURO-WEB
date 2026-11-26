<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
{
    public function index()
    {
        $items = TeamMember::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.team.index', compact('items'));
    }

    public function create()
    {
        return view('admin.team.form', ['item' => new TeamMember(['is_active' => true, 'sort_order' => 99])]);
    }

    public function store(Request $request)
    {
        $item = TeamMember::query()->create($this->validated($request));
        $this->storePhoto($request, $item);

        return redirect()->route('admin.team.index')->with('success', 'Integrante agregado al directorio.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.form', ['item' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $team->update($this->validated($request));
        $this->storePhoto($request, $team);

        if ($request->boolean('remove_photo') && $team->photo_path) {
            Storage::disk('public')->delete($team->photo_path);
            $team->update(['photo_path' => null]);
        }

        return redirect()->route('admin.team.index')->with('success', 'Integrante actualizado.');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->photo_path) {
            Storage::disk('public')->delete($team->photo_path);
        }
        $team->delete();

        return back()->with('success', 'Integrante eliminado.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'initials' => 'nullable|string|max:8',
            'specialty' => 'required|string|max:150',
            'experience' => 'nullable|string|max:150',
            'bio' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer|min:0|max:999',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        unset($data['photo']);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['initials'] = $data['initials'] ?: $this->makeInitials($data['name']);

        return $data;
    }

    private function storePhoto(Request $request, TeamMember $item): void
    {
        if (!$request->hasFile('photo')) {
            return;
        }

        if ($item->photo_path) {
            Storage::disk('public')->delete($item->photo_path);
        }

        $item->update([
            'photo_path' => $request->file('photo')->store('team', 'public'),
        ]);
    }

    private function makeInitials(string $name): string
    {
        $parts = preg_split('/\s+/', trim(preg_replace('/^(Dr\.|Dra\.)\s+/i', '', $name)));
        $letters = '';
        foreach (array_slice($parts, 0, 3) as $part) {
            $letters .= mb_strtoupper(mb_substr($part, 0, 1));
        }

        return $letters ?: 'IN';
    }
}
