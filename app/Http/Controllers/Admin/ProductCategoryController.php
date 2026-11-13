<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.product-categories.index', compact('categories'));
    }

    public function create()
    {
        $nextSortOrder = (ProductCategory::max('sort_order') ?? 0) + 1;

        return view('admin.product-categories.create', compact('nextSortOrder'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'logo' => 'nullable|file|mimes:svg|max:512',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('product-categories', 'public');
        }

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')
                ->store('product-category-logos', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? $nextSortOrder
            ?? ((ProductCategory::max('sort_order') ?? 0) + 1);

        ProductCategory::create($validated);

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Kategori produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);

        return view('admin.product-categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'logo' => 'nullable|file|mimes:svg|max:512',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            $validated['image'] = $request->file('image')
                ->store('product-categories', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($category->logo) {
                Storage::disk('public')->delete($category->logo);
            }

            $validated['logo'] = $request->file('logo')
                ->store('product-category-logos', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $category->update($validated);

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Kategori produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        if ($category->products()->exists()) {
            return redirect()
                ->route('admin.product-categories.index')
                ->with('error', 'Kategori tidak bisa dihapus karena masih memiliki produk.');
        }

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        if ($category->logo) {
            Storage::disk('public')->delete($category->logo);
        }

        $category->delete();

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Kategori produk berhasil dihapus.');
    }
}
