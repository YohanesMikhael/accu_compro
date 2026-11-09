<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $profile = CompanyProfile::firstOrCreate(
            [],
            [
                'title' => 'Mengenal Lebih Dekat ACCU',
                'description' => 'PT. ABHINAYA CITRA CAKRA UTAMA (ACCU) merupakan perusahaan yang bergerak di bidang pengadaan barang dan penyedia jasa tenaga kerja yang berdiri sejak tahun 2022.',
                'business_license' => "Supplier, Distributor, Perdagangan Besar Barang dan Seragam.\nPenyedia Jasa Tenaga Kerja (CSO / OB / Kurir / Receptionist / dan tenaga kerja pendukung lainnya)",
                'address' => 'Perumahan Pondok Surya, Blok C No.5, Kel/Kec. Karang Tengah, Kota Tangerang – Banten 15157.',
                'covered_area' => 'Nasional',
                'phone' => '0878 6236 6096',
                'email' => 'marketing@abhinaya-accu.com',
            ]
        );

        return view('admin.about.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = CompanyProfile::firstOrCreate(
            [],
            [
                'title' => 'Mengenal Lebih Dekat ACCU',
            ]
        );

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'business_license' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'covered_area' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        $oldImage = $profile->image;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('about', 'public');
        }

        $profile->update($validated);

        // Hapus gambar lama setelah gambar baru berhasil disimpan.
        if ($request->hasFile('image') && $oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'About Section berhasil diperbarui.');
    }
}
