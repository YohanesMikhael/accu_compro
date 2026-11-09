<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OperationalFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OperationalFacilityController extends Controller
{
    public function edit()
    {
        $facilities = OperationalFacility::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.operational-facilities.edit', compact('facilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'quantity' => 'nullable|integer|min:0',
            'capacity' => 'nullable|string|max:255',
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('operational-facilities', 'public')
            : null;

        OperationalFacility::create([
            'name' => $validated['name'],
            'type' => $validated['type'] ?? null,
            'description' => $validated['description'] ?? null,
            'quantity' => $validated['quantity'] ?? null,
            'capacity' => $validated['capacity'] ?? null,
            'image' => $imagePath,
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.operational-facilities.edit')
            ->with('success', 'Kendaraan operasional berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $facility = OperationalFacility::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'quantity' => 'nullable|integer|min:0',
            'capacity' => 'nullable|string|max:255',
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $imagePath = $facility->image;

        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $request->file('image')
                ->store('operational-facilities', 'public');
        }

        $facility->update([
            'name' => $validated['name'],
            'type' => $validated['type'] ?? null,
            'description' => $validated['description'] ?? null,
            'quantity' => $validated['quantity'] ?? null,
            'capacity' => $validated['capacity'] ?? null,
            'image' => $imagePath,
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.operational-facilities.edit')
            ->with('success', 'Kendaraan operasional berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $facility = OperationalFacility::findOrFail($id);

        if ($facility->image) {
            Storage::disk('public')->delete($facility->image);
        }

        $facility->delete();

        return redirect()
            ->route('admin.operational-facilities.edit')
            ->with('success', 'Kendaraan operasional berhasil dihapus.');
    }
}
