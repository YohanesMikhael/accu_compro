<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('sort_order')->get();

        return view(
            'admin.sections.index',
            compact('sections')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'is_active' => ['required', 'boolean'],
        ]);

        $section = Section::findOrFail($id);

        $section->update([
            'is_active' => $request->is_active,
        ]);

        return back()->with(
            'success',
            'Status section berhasil diperbarui.'
        );
    }
}
