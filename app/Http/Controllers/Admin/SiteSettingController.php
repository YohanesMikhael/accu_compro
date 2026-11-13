<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $setting = SiteSetting::firstOrCreate([]);

        return view('admin.site-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SiteSetting::firstOrCreate([]);

        $validated = $request->validate([
            'company_name' => ['nullable', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'company_description' => ['nullable', 'string'],
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        if ($request->hasFile('logo')) {
            $newLogo = $request->file('logo')
                ->store('site-settings', 'public');

            // Hapus logo lama setelah logo baru berhasil di-upload
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $validated['logo'] = $newLogo;
        }

        $setting->update($validated);

        return redirect()
            ->route('admin.site-settings.edit')
            ->with('success', 'Identitas perusahaan berhasil diperbarui.');
    }
}
