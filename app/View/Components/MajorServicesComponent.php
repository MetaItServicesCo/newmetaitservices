<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MajorServicesComponent extends Component
{
    public $majorServices;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->majorServices = \App\Models\Services::select('title', 'slug', 'short_description', 'thumbnail', 'thumbnail_alt', 'is_active')
            ->where('is_active', true)
            ->latest()
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.major-services-component');
    }
}
