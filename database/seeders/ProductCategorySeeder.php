<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Chemical',
            'Equipment',
            'Consumable',
            'Accessories',
        ];

        foreach ($categories as $index => $category) {
            ProductCategory::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($category)],
                [
                    'name' => $category,
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}