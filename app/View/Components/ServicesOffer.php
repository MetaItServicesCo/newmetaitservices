<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\SubService;

class ServicesOffer extends Component
{
    public $offers;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->offers = SubService::select('title', 'slug', 'icon', 'short_description')->where('is_active', true)
            ->where('show_on_landing_page', true)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.services-offer');
    }
}
