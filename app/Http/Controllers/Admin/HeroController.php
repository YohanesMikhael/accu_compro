<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::firstOrCreate(
            [],
            [
                'headline' => 'Welcome to Our Company',
                'hero_type' => 'image',
            ]
        );

        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $hero = Hero::firstOrCreate(
            [],
            [
                'headline' => 'Welcome to Our Company',
                'hero_type' => 'image',
            ]
        );

        $validated = $request->validate([
            'subtitle' => ['nullable', 'string', 'max:255'],
            'headline' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'hero_type' => ['required', 'in:image,video'],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'video' => [
                'nullable',
                'mimes:mp4,webm',
                'max:51200',
            ],

            'video_poster' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'secondary_button_text' => ['nullable', 'string', 'max:255'],
            'secondary_button_url' => ['nullable', 'string', 'max:255'],
        ]);

        // Pastikan media untuk mode yang dipilih tersedia.
        if (
            $validated['hero_type'] === 'image' &&
            !$request->hasFile('image') &&
            !$hero->image
        ) {
            return back()
                ->withErrors(['image' => 'Silakan upload gambar Hero.'])
                ->withInput();
        }

        if (
            $validated['hero_type'] === 'video' &&
            !$request->hasFile('video') &&
            !$hero->video
        ) {
            return back()
                ->withErrors(['video' => 'Silakan upload video Hero.'])
                ->withInput();
        }

        $oldFiles = [];

        // Upload gambar baru.
        if ($request->hasFile('image')) {
            $oldFiles[] = $hero->image;

            $validated['image'] = $request->file('image')
                ->store('heroes/images', 'public');
        }

        // Upload video baru.
        if ($request->hasFile('video')) {
            $oldFiles[] = $hero->video;

            $validated['video'] = $request->file('video')
                ->store('heroes/videos', 'public');
        }

        // Upload poster video baru.
        if ($request->hasFile('video_poster')) {
            $oldFiles[] = $hero->video_poster;

            $validated['video_poster'] = $request->file('video_poster')
                ->store('heroes/posters', 'public');
        }

        $hero->update($validated);

        // Hapus file lama setelah data berhasil diperbarui.
        foreach ($oldFiles as $oldFile) {
            if ($oldFile) {
                Storage::disk('public')->delete($oldFile);
            }
        }

        return redirect()
            ->route('admin.hero.edit')
            ->with('success', 'Pengaturan Hero berhasil diperbarui.');
    }
}