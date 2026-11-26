<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSiteController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit', [
            'site' => SiteSetting::map(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone_fixed_display' => 'required|string|max:40',
            'wa1_display' => 'required|string|max:40',
            'wa1_label' => 'required|string|max:120',
            'wa2_display' => 'required|string|max:40',
            'wa2_label' => 'required|string|max:120',
            'address' => 'required|string|max:255',
            'maps_url' => 'required|url|max:500',
            'hours_weekdays' => 'required|string|max:120',
            'hours_saturday' => 'required|string|max:120',
            'facebook' => 'nullable|url|max:300',
            'instagram' => 'nullable|url|max:300',
            'contact_email' => 'required|email|max:150',
            'hero_eyebrow' => 'required|string|max:120',
            'hero_line1' => 'required|string|max:80',
            'hero_line2' => 'required|string|max:80',
            'hero_em' => 'required|string|max:120',
            'hero_desc' => 'required|string|max:500',
            'banner_seconds' => 'required|integer|min:5|max:300',
            'youtube' => 'nullable|url|max:300',
            'tiktok' => 'nullable|url|max:300',
            'services_title' => 'required|string|max:120',
            'services_subtitle' => 'nullable|string|max:300',
            'cta_title' => 'required|string|max:160',
            'cta_desc' => 'nullable|string|max:300',
            'payments_email' => 'required|email|max:150',
            'qr_pagos' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'qr_donaciones' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        SiteSetting::putMany(SiteSetting::fromAdminInput($validated));

        foreach (['qr_pagos', 'qr_donaciones'] as $field) {
            $key = $field . '_path';
            $current = SiteSetting::getValue($key, '');

            if ($request->hasFile($field)) {
                if ($current) {
                    Storage::disk('public')->delete($current);
                }
                SiteSetting::putMany([$key => $request->file($field)->store('site', 'public')]);
            } elseif ($request->boolean('remove_' . $field) && $current) {
                Storage::disk('public')->delete($current);
                SiteSetting::putMany([$key => '']);
            }
        }

        return back()->with('success', 'Los cambios ya se ven en el sitio público.');
    }
}
