<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Section;
use App\Models\Menu;
use App\Models\Hero;
use App\Models\CompanyProfile;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\CompanyValue;
use App\Models\Service;
use App\Models\OperationalFacility;
use App\Models\Client;
use App\Models\ProductCategory;
use App\Models\Gallery;
use App\Models\SiteSetting;
use App\Models\ContactSetting;

class HomeController extends Controller
{
    public function index()
    {
        $sections = Section::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $menus = Menu::with('section')
            ->where('is_active', true)
            ->whereHas('section', function ($query) {
                $query->where('is_active', true);
            })
            ->orderBy('sort_order')
            ->get();

        $hero = Hero::first();

        $profile = CompanyProfile::first();

        $vision = Vision::first();

        $missions = Mission::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $values = CompanyValue::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $facilities = OperationalFacility::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $clients = Client::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $categories = ProductCategory::with([
                'products' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order');
                }
            ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $galleries = Gallery::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $settings = SiteSetting::first();

        $contact = ContactSetting::first();

        return view('frontend.home', compact(
            'sections',
            'menus',
            'hero',
            'profile',
            'vision',
            'missions',
            'values',
            'services',
            'facilities',
            'clients',
            'categories',
            'galleries',
            'contact',
            'settings'
        ));
    }
}
