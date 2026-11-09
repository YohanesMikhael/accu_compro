<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    // Menampilkan halaman pengaturan Contact Us
    public function edit()
    {
        $contact = ContactSetting::first();

        return view('admin.contact-settings.edit', compact('contact'));
    }

    // Menyimpan perubahan Contact Us
    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'nullable|string|max:30',
            'whatsapp' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'maps_url' => 'nullable|url|max:2048',
            'maps_embed_url' => 'nullable|url|max:2048',
        ]);

        ContactSetting::updateOrCreate(
            ['id' => 1],
            $validated
        );

        return redirect()
            ->route('admin.contact-settings.edit')
            ->with('success', 'Informasi Contact Us berhasil diperbarui.');
    }
}
