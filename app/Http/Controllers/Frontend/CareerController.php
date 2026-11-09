<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CareerPosition;

class CareerController extends Controller
{
    public function index()
    {
        $positions = CareerPosition::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('deadline')
                    ->orWhereDate('deadline', '>=', now()->toDateString());
            })
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('frontend.sections.career.index', compact('positions'));
    }

    public function show($slug)
    {
        $position = CareerPosition::where('slug', $slug)
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('deadline')
                    ->orWhereDate('deadline', '>=', now()->toDateString());
            })
            ->firstOrFail();

        return view('frontend.sections.career.show', compact('position'));
    }
}