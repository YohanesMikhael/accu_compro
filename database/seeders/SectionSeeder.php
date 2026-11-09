<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['section_key' => 'hero', 'title' => 'Hero Section'],
            ['section_key' => 'our-profile', 'title' => 'Our Profile'],
            ['section_key' => 'vision-mission', 'title' => 'Vision & Mission'],
            ['section_key' => 'company-values', 'title' => 'Company Values'],
            ['section_key' => 'products-services', 'title' => 'Products & Services'],
            ['section_key' => 'operational-facilities', 'title' => 'Operational Facilities'],
            ['section_key' => 'clients', 'title' => 'Our Clients'],
            ['section_key' => 'product-catalog', 'title' => 'Product Catalog'],
            ['section_key' => 'gallery', 'title' => 'Gallery'],
            ['section_key' => 'contact', 'title' => 'Contact Us'],
        ];

        foreach ($sections as $index => $section) {
            Section::updateOrCreate(
                ['section_key' => $section['section_key']],
                [
                    'title' => $section['title'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}
