<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KpiSectionComponent extends Component
{
    public $kpis;
    public $activeKpi;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->kpis = \App\Models\KpiSection::orderBy('tag', 'asc')->get();
        $this->activeKpi = $this->kpis->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kpi-section-component');
    }
}
