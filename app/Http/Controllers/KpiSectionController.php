<?php

namespace App\Http\Controllers;

use App\DataTables\KpiSectionDataTable;
use App\Http\Requests\StoreKpiSectionRequest;
use App\Http\Requests\UpdateKpiSectionRequest;
use App\Models\KpiSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class KpiSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): RedirectResponse
    {
            return redirect()->route('admin.kpi-sections.list');
    }

    /**
     * List KPI sections using DataTable.
     */
    public function list(KpiSectionDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.kpi-sections.list');
        } catch (\Throwable $e) {
            Log::error('KPI Section List Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to load KPI sections.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        try {
            return view('pages.kpi-sections.create');
        } catch (\Throwable $e) {
            Log::error('KPI Section Create Page Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to open create page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKpiSectionRequest $request): RedirectResponse
    {
        try {
            KpiSection::create($request->validated());

            return redirect()->route('admin.kpi-sections.list')
                ->with('success', 'KPI section created successfully.');
        } catch (\Throwable $e) {
            Log::error('KPI Section Store Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to create KPI section.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KpiSection $kpiSection): View
    {
        try {
            return view('pages.kpi-sections.show', compact('kpiSection'));
        } catch (\Throwable $e) {
            Log::error('KPI Section Show Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to load KPI section.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KpiSection $kpiSection): View
    {
        try {
            return view('pages.kpi-sections.edit', compact('kpiSection'));
        } catch (\Throwable $e) {
            Log::error('KPI Section Edit Page Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to open edit page.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKpiSectionRequest $request, KpiSection $kpiSection): RedirectResponse
    {
        try {
            $kpiSection->update($request->validated());

            return redirect()->route('admin.kpi-sections.list')
                ->with('success', 'KPI section updated successfully.');
        } catch (\Throwable $e) {
            Log::error('KPI Section Update Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to update KPI section.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KpiSection $kpiSection): RedirectResponse
    {
        try {
            $kpiSection->delete();

            return redirect()->route('admin.kpi-sections.list')
                ->with('success', 'KPI section deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('KPI Section Destroy Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to delete KPI section.');
        }
    }
}
