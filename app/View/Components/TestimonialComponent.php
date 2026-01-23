<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Testimonial;

class TestimonialComponent extends Component
{
    public $testimonials;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->testimonials = Testimonial::where('is_active', true)
            ->latest()
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.testimonial-component');
    }
}
