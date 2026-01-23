<?php

namespace App\DataTables;

use App\Models\SubService;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class SubServicesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('service_name', function ($row) {
                return $row->service ? $row->service->title : 'N/A';
            })
            ->addColumn('is_active', function ($row) {
                return $row->is_active ?
                    '<span class="badge badge-light-success">Active</span>' :
                    '<span class="badge badge-light-danger">Inactive</span>';
            })
            ->addColumn('show_on_services_page', function ($row) {
                return $row->show_on_services_page ?
                    '<span class="badge badge-light-info">Yes</span>' :
                    '<span class="badge badge-light-secondary">No</span>';
            })

            ->editColumn('created_at', fn($row) => Carbon::parse($row->created_at)->format('d-M-Y'))
            ->editColumn('updated_at', fn($row) => $row->updated_at ? Carbon::parse($row->updated_at)->format('d-M-Y') : '-')
            ->orderColumn('created_at', 'sub_services.created_at $1')
            ->orderColumn('updated_at', 'sub_services.updated_at $1')

            ->addColumn('action', fn($row) => view('pages.sub-services._actions', compact('row'))->render())
            ->rawColumns(['is_active', 'show_on_services_page', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SubService $model): QueryBuilder
    {
        return $model->newQuery()->with('service');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('subservices-table')
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
            Column::make('title')->title('Title'),
            Column::make('service_name')->title('Parent Service'),
            Column::make('slug')->title('Slug'),
            Column::make('is_active')->title('Is Active'),
            Column::make('show_on_services_page')->title('Show on Services Page'),
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
        return 'SubServices_'.date('YmdHis');
    }
}
