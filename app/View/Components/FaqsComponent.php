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
    public function __construct($pageName = null, $faqs = null)
    {
        // If faqs array is passed (from services table JSON), use it
        if (! empty($faqs) && is_array($faqs)) {
            $this->faqs = collect($faqs);

            return;
        }

        // Otherwise use FAQ table by page_name
        $pageName = $pageName ?? 'landing';
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
