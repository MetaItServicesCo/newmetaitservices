<?php

namespace App\DataTables;

use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ServicesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('is_active', function ($service) {
                if ($service->is_active) {
                    return '<span class="badge badge-success">Active</span>';
                }
                return '<span class="badge badge-danger">Inactive</span>';
            })
            ->editColumn('thumbnail', function ($service) {
                if (!$service->thumbnail) {
                    return '-';
                }

                $url = asset('storage/' . $service->thumbnail);

                return '<img src="' . $url . '" alt="Thumbnail" width="60" height="60" style="object-fit: cover; border-radius: 5px;">';
            })
            ->editColumn('created_at', fn($service) => Carbon::parse($service->created_at)->format('d-M-Y'))
            ->editColumn('updated_at', fn($service) => $service->updated_at ? Carbon::parse($service->updated_at)->format('d-M-Y') : '-')
            ->orderColumn('created_at', 'services.created_at $1')
            ->orderColumn('updated_at', 'services.updated_at $1')
            ->addColumn('action', fn($service) => view('pages.services._actions', compact('service'))->render())
            ->rawColumns(['action', 'is_active', 'thumbnail'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Services $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('services-table')
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
            Column::make('thumbnail')->title('Thumbnail'),
            Column::make('title')->title('Title'),
            Column::make('slug')->title('Slug'),
            Column::make('is_active')->title('Is Active'),
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
        return 'Services_' . date('YmdHis');
    }
}
