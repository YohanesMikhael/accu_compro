<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function edit()
    {
        $galleries = Gallery::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.galleries.edit', compact('galleries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $image = $request->file('image')
            ->store('galleries', 'public');

        Gallery::create([
            'title' => $validated['title'] ?? null,
            'description' => $validated['description'] ?? null,
            'image' => $image,
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.galleries.edit')
            ->with('success', 'Foto gallery berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            $gallery->image = $request->file('image')
                ->store('galleries', 'public');
        }

        $gallery->title = $validated['title'] ?? null;
        $gallery->description = $validated['description'] ?? null;
        $gallery->is_active = $request->boolean('is_active');
        $gallery->sort_order = $validated['sort_order'] ?? 0;

        $gallery->save();

        return redirect()
            ->route('admin.galleries.edit')
            ->with('success', 'Foto gallery berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()
            ->route('admin.galleries.edit')
            ->with('success', 'Foto gallery berhasil dihapus.');
    }
}
