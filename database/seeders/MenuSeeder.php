<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            'our-profile' => ['Our Profile', 'profile'],
            'vision-mission' => ['Vision & Mission', 'vision-mission'],
            'company-values' => ['Our Values', 'values'],
            'products-services' => ['Services', 'services'],
            'operational-facilities' => ['Facilities', 'facilities'],
            'clients' => ['Our Clients', 'clients'],
            'product-catalog' => ['Catalog', 'catalog'],
            'gallery' => ['Gallery', 'gallery'],
            'contact' => ['Contact', 'contact'],
        ];

        foreach ($menus as $key => $data) {
            $section = Section::where('section_key', $key)->first();

            if (!$section) {
                continue;
            }

            Menu::updateOrCreate(
                ['section_id' => $section->id],
                [
                    'label' => $data[0],
                    'anchor' => $data[1],
                    'is_active' => true,
                    'sort_order' => $section->sort_order,
                ]
            );
        }
    }
}
