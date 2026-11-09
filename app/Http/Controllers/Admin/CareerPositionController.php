<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CareerPositionController extends Controller
{
    public function index()
    {
        $positions = CareerPosition::orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.career-positions.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.career-positions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'application_url' => 'nullable|url|max:2048',
            'deadline' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (CareerPosition::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $validated['slug'] = $slug;
        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        CareerPosition::create($validated);

        return redirect()
            ->route('admin.career-positions.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $position = CareerPosition::findOrFail($id);

        return view('admin.career-positions.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $position = CareerPosition::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'application_url' => 'nullable|url|max:2048',
            'deadline' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $validated['slug'] = Str::slug($validated['title']);
        $baseSlug = $validated['slug'];
        $counter = 1;

        while (
            CareerPosition::where('slug', $validated['slug'])
                ->where('id', '!=', $position->id)
                ->exists()
        ) {
            $validated['slug'] = $baseSlug . '-' . $counter++;
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $position->update($validated);

        return redirect()
            ->route('admin.career-positions.index')
            ->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $position = CareerPosition::findOrFail($id);
        $position->delete();

        return redirect()
            ->route('admin.career-positions.index')
            ->with('success', 'Lowongan berhasil dihapus.');
    }
}