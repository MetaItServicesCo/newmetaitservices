<?php

namespace App\DataTables;

use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class QuestionsDataTable extends DataTable
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
            ->editColumn('message', fn ($row) => strlen($row->message) > 50 ? substr($row->message, 0, 50).'...' : $row->message)
            ->editColumn('agree', fn ($row) => $row->agree ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>')
            ->editColumn('created_at', fn ($row) => Carbon::parse($row->created_at)->format('d-M-Y H:i'))
            ->orderColumn('created_at', 'questions.created_at $1')
            ->addColumn('action', fn ($row) => view('pages.questions._actions', compact('row'))->render())
            ->rawColumns(['action', 'email', 'agree'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Question $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('questions-table')
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
            Column::make('name')->title('Name'),
            Column::make('email')->title('Email'),
            Column::make('country')->title('Country'),
            Column::make('message')->title('Message')
                ->searchable(false)->orderable(false),
            Column::make('agree')->title('Agreed'),
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
        return 'Questions_'.date('YmdHis');
    }
}
