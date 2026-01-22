<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FaqsComponent extends Component
{
    public $faqs;

    /**
     * Create a new component instance.
     */
    public function __construct($pageName = 'landing')
    {
        $this->faqs = \App\Models\Faq::where('page_name', $pageName)->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.faqs-component');
    }
}
