<?php

namespace App\DataTables;

use App\Models\ProjectRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProjectRequestDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->editColumn('selected_date', fn ($row) => Carbon::parse($row->selected_date)->format('d-M-Y'))
            ->editColumn('email', fn ($row) => '<a href="mailto:'.$row->email.'">'.$row->email.'</a>')
            ->editColumn('phone', fn ($row) => $row->phone ?: '-')
            ->editColumn('website_url', function ($row) {
                if (!$row->website_url) {
                    return '-';
                }
                return '<a href="'.$row->website_url.'" target="_blank" class="btn btn-sm btn-outline-primary">Visit</a>';
            })
            ->editColumn('message', fn ($row) => strlen($row->message) > 50 ? substr($row->message, 0, 50).'...' : $row->message)
            ->editColumn('created_at', fn ($row) => Carbon::parse($row->created_at)->format('d-M-Y'))

            // Tell Yajra how to sort these formatted columns
            ->orderColumn('selected_date', 'project_requests.selected_date $1')
            ->orderColumn('created_at', 'project_requests.created_at $1')

            ->addColumn('action', fn ($row) => view('pages.project-requests._actions', compact('row'))->render())
            ->rawColumns(['action', 'email', 'website_url'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProjectRequest $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('projectrequest-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(9, 'desc')
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
            Column::make('first_name')->title('First Name'),
            Column::make('last_name')->title('Last Name'),
            Column::make('email')->title('Email'),
            Column::make('phone')->title('Phone'),
            Column::make('company_name')->title('Company'),
            Column::make('selected_date')->title('Selected Date'),
            Column::make('weekday')->title('Day'),
            Column::make('website_url')->title('Website')
                ->searchable(false)->orderable(false),
            Column::make('message')->title('Message')
                ->searchable(false)->orderable(false),
            Column::make('created_at')->title('Submitted At'),

            Column::computed('action')
                ->title('Actions')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProjectRequest_'.date('YmdHis');
    }
}
