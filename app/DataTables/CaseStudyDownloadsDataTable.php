<?php

namespace App\DataTables;

use App\Models\CaseStudyDownload;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CaseStudyDownloadsDataTable extends DataTable
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
            ->editColumn('case_study_id', function ($row) {
                $caseStudy = \App\Models\CaseStudy::find($row->case_study_id);
                return $caseStudy ? $caseStudy->title : 'N/A';
            })
            ->editColumn('created_at', fn ($row) => Carbon::parse($row->created_at)->format('d-M-Y H:i'))
            ->orderColumn('created_at', 'case_study_downloads.created_at $1')
            ->addColumn('action', fn ($row) => view('pages.case-study-downloads._actions', compact('row'))->render())
            ->rawColumns(['action', 'email'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(CaseStudyDownload $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('case-study-downloads-table')
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
            Column::make('name')->title('Name')->searchable(true),
            Column::make('email')->title('Email')->searchable(true),
            Column::make('phone_number')->title('Phone')->searchable(true),
            Column::make('location')->title('Location')->searchable(true),
            Column::make('case_study_id')->title('Case Study')->searchable(true),
            Column::make('created_at')->title('Downloaded At')->searchable(true),

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
        return 'CaseStudyDownloads_'.date('YmdHis');
    }
}
