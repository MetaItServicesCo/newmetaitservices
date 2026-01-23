<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PortfolioComponent extends Component
{
    public $portfolios;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Fetch active portfolios from the database
        $this->portfolios = \App\Models\Portfolio::select('title', 'slug', 'sub_title', 'thumbnail')
            ->where('is_active', true)
            ->where('show_on_landing_page', true)
            ->latest()
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portfolio-component');
    }
}
