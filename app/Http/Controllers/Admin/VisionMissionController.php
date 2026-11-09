<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisionMissionController extends Controller
{
    /**
     * Menampilkan halaman edit Visi & Misi.
     */
    public function edit()
    {
        $vision = Vision::firstOrCreate(
            [],
            ['content' => 'Menjadi perusahaan penyedia barang dan jasa tenaga kerja yang terpercaya, profesional, dan berkelanjutan di Indonesia.']
        );

        $missions = Mission::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.vision-mission.edit', compact(
            'vision',
            'missions'
        ));
    }

    /**
     * Menyimpan perubahan Visi & Misi.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'vision' => ['required', 'string'],

            'missions' => ['required', 'array', 'min:1'],
            'missions.*' => ['required', 'string', 'max:2000'],
        ], [
            'vision.required' => 'Visi perusahaan wajib diisi.',
            'missions.required' => 'Minimal harus ada satu misi.',
            'missions.min' => 'Minimal harus ada satu misi.',
            'missions.*.required' => 'Isi setiap misi terlebih dahulu.',
        ]);

        DB::transaction(function () use ($validated) {

            // Simpan visi
            $vision = Vision::firstOrCreate([]);

            $vision->update([
                'content' => $validated['vision'],
            ]);

            // Simpan ulang daftar misi sesuai urutan form
            Mission::query()->delete();

            foreach ($validated['missions'] as $index => $content) {
                Mission::create([
                    'content' => $content,
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]);
            }
        });

        return redirect()
            ->route('admin.vision-mission.edit')
            ->with('success', 'Visi & Misi berhasil diperbarui.');
    }
}
