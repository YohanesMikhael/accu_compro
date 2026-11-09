<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyValue;
use Illuminate\Http\Request;

class CompanyValueController extends Controller
{
    public function edit()
    {
        $values = CompanyValue::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.company-values.edit', compact('values'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['required', 'string', 'max:100'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $validated['sort_order'] = $validated['sort_order']
            ?? ((CompanyValue::max('sort_order') ?? 0) + 1);

        CompanyValue::create($validated);

        return redirect()
            ->route('admin.our-values.edit')
            ->with('success', 'Company Value berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $value = CompanyValue::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['required', 'string', 'max:100'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $value->update($validated);

        return redirect()
            ->route('admin.our-values.edit')
            ->with('success', 'Company Value berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $value = CompanyValue::findOrFail($id);
        $value->delete();

        return redirect()
            ->route('admin.our-values.edit')
            ->with('success', 'Company Value berhasil dihapus.');
    }
}