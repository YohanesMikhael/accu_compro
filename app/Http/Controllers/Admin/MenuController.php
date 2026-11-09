<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('section')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.menus.index', compact('menus'));
    }

    public function toggle(Request $request, $id)
    {
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $menu = Menu::with('section')->findOrFail($id);

        $isActive = $request->boolean('is_active');

        DB::transaction(function () use ($menu, $isActive) {

            // Update status menu
            $menu->update([
                'is_active' => $isActive,
            ]);

            // Update status section induknya
            if ($menu->section) {
                $menu->section->update([
                    'is_active' => $isActive,
                ]);
            }
        });

        return redirect()
            ->route('admin.menus.index')
            ->with('success', 'Status menu dan section berhasil diperbarui.');
    }
}