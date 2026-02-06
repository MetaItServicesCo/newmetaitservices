<?php

namespace App\DataTables;

use App\Models\ContactInquiry;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactInquiriesDataTable extends DataTable
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
            ->editColumn('phone_number', fn ($row) => $row->phone_number)
            ->editColumn('company_name', fn ($row) => $row->company_name ?? '-')
            ->editColumn('message', fn ($row) => strlen($row->message) > 50 ? substr($row->message, 0, 50).'...' : $row->message)
            ->editColumn('created_at', fn ($row) => Carbon::parse($row->created_at)->format('d-M-Y H:i'))
            ->orderColumn('created_at', 'contact_inquiries.created_at $1')
            ->addColumn('action', fn ($row) => view('pages.contact-inquiries._actions', compact('row'))->render())
            ->rawColumns(['action', 'email'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ContactInquiry $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('contact-inquiries-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(6, 'desc')
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
            Column::make('first_name')->title('First Name')->searchable(true),
            Column::make('last_name')->title('Last Name')->searchable(true),
            Column::make('email')->title('Email')->searchable(true),
            Column::make('phone_number')->title('Phone')->searchable(true),
            Column::make('company_name')->title('Company')->searchable(true),
            Column::make('message')->title('Message')->searchable(false)->orderable(false),
            Column::make('created_at')->title('Submitted At')->searchable(true),

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
        return 'ContactInquiries_'.date('YmdHis');
    }
}
