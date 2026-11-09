<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::with([
            'products' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('sort_order');
            }
        ])
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

        return view(
            'frontend.catalog.index',
            compact('categories')
        );
    }

    public function show($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->whereHas('category', function ($query) {
                $query->where('is_active', true);
            })
            ->firstOrFail();

        return view(
            'frontend.catalog.show',
            compact('product')
        );
    }
}
