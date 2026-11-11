<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CareerPosition;
use App\Models\ContactSetting;
use App\Models\Menu;
use App\Models\Service;

class CareerController extends Controller
{
    private function getMenus()
    {
        return Menu::with('section')
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('section_id')
                    ->orWhereHas('section', function ($sectionQuery) {
                        $sectionQuery->where('is_active', true);
                    });
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    private function getServices()
    {
        return Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    public function index()
    {
        $menus = $this->getMenus();

        $services = $this->getServices();
        $contact = ContactSetting::first();

        $positions = CareerPosition::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('deadline')
                    ->orWhereDate('deadline', '>=', today());
            })
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('frontend.sections.career.index', compact(
            'services',
            'menus',
            'contact',
            'positions'
        ));
    }

    public function show($slug)
    {
        $menus = $this->getMenus();
        $services = $this->getServices();
        $contact = ContactSetting::first();


        $position = CareerPosition::where('slug', $slug)
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('deadline')
                    ->orWhereDate('deadline', '>=', today());
            })
            ->firstOrFail();

        return view('frontend.sections.career.show', compact(
            'services',
            'contact',
            'menus',
            'position'
        ));
    }
}
