<?php

namespace App\DataTables;

use App\Models\ServiceInquiry;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ServiceInquiriesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('email', fn ($row) => '<a href="mailto:'.$row->email.'">'.$row->email.'</a>')
            ->editColumn('phone_number', fn ($row) => $row->country_code.' '.$row->phone_number)
            ->editColumn('has_website', fn ($row) => $row->has_website ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>')
            ->editColumn('services', function ($row) {
                $services = is_array($row->services) ? $row->services : json_decode($row->services, true);
                return count($services ?? []) . ' service(s)';
            })
            ->editColumn('message', fn ($row) => strlen($row->message) > 50 ? substr($row->message, 0, 50).'...' : $row->message)
            ->editColumn('status', function ($row) {
                $badgeClass = match($row->status) {
                    'pending' => 'bg-warning',
                    'reviewed' => 'bg-info',
                    'contacted' => 'bg-success',
                    default => 'bg-secondary',
                };
                return '<span class="badge '.$badgeClass.'">'.ucfirst($row->status).'</span>';
            })
            ->editColumn('created_at', fn ($row) => Carbon::parse($row->created_at)->format('d-M-Y H:i'))
            ->orderColumn('created_at', 'service_inquiries.created_at $1')
            ->addColumn('action', fn ($row) => view('pages.service-inquiries._actions', compact('row'))->render())
            ->rawColumns(['action', 'email', 'has_website', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ServiceInquiry $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('service-inquiries-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(8, 'desc')
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
            Column::make('phone_number')->title('Phone'),
            Column::make('has_website')->title('Website'),
            Column::make('services')->title('Services')
                ->searchable(false)->orderable(false),
            Column::make('message')->title('Message')
                ->searchable(false)->orderable(false),
            Column::make('status')->title('Status'),
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
        return 'ServiceInquiries_'.date('YmdHis');
    }
}
