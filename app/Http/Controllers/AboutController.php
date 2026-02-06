<?php

namespace App\Http\Controllers;

use App\Models\BrandWeCarry;
use App\Models\Team;

class AboutController extends Controller
{
    public function about()
    {
        $seoMeta = \App\Models\SeoMeta::where('page_name', 'about')
            ->where('is_active', 1)
            ->first();

        $teams = Team::where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->get();

        $brands = BrandWeCarry::orderBy('company_name', 'asc')->get();

        return view('frontend.pages.about', compact('seoMeta', 'teams', 'brands'));
    }
}
