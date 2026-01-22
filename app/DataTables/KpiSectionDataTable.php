<?php

namespace App\DataTables;

use App\Models\KpiSection;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KpiSectionDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('title', fn($kpi) => $kpi->content['title'] ?? '-')
            ->addColumn('subtitle', fn($kpi) => $kpi->content['subtitle'] ?? '-')
            ->addColumn('points_count', fn($kpi) => count($kpi->content['points'] ?? []))
            ->editColumn('created_at', fn($kpi) => Carbon::parse($kpi->created_at)->format('d-M-Y'))
            ->editColumn('updated_at', fn($kpi) => $kpi->updated_at ? Carbon::parse($kpi->updated_at)->format('d-M-Y') : '-')
            ->orderColumn('created_at', 'kpi_sections.created_at $1')
            ->orderColumn('updated_at', 'kpi_sections.updated_at $1')
            ->addColumn('action', fn($kpi) => view('pages.kpi-sections._actions', compact('kpi'))->render())
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KpiSection $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kpi-section-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(5, 'desc')
            ->addTableClass('table table-striped table-row-bordered gy-5 gs-7 border rounded text-gray-700 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->drawCallback(
                "function() {
                    if (typeof KTMenu !== 'undefined') {
                        KTMenu.createInstances();
                    }
                }"
            );
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('tag')->title('Tag'),
            Column::make('title')->title('Title'),
            Column::make('subtitle')->title('Subtitle'),
            Column::make('points_count')->title('Points Count'),
            Column::make('created_at')->title('Created At'),
            Column::make('updated_at')->title('Updated At'),
            Column::computed('action')
                ->title('Actions')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'KpiSection_' . date('YmdHis');
    }
}