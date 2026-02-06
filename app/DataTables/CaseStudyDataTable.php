<?php

namespace App\DataTables;

use App\Models\CaseStudy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CaseStudyDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->editColumn('image', function ($c) {
                if (! $c->image) {
                    return '-';
                }

                $url = asset('storage/case_study/'.$c->image);

                return '<img src="'.$url.'" alt="Image" width="60" height="60" style="object-fit: cover; border-radius: 5px;">';
            })

            ->editColumn('document', function ($c) {
                if (! $c->document) {
                    return '-';
                }

                $url = asset('storage/case_study/'.$c->document);

                return '<a href="'.$url.'" target="_blank" class="btn btn-sm btn-outline-primary">View Document</a>';
            })

            ->editColumn('created_at', fn ($c) => Carbon::parse($c->created_at)->format('d-M-Y'))
            ->editColumn('updated_at', fn ($c) => $c->updated_at ? Carbon::parse($c->updated_at)->format('d-M-Y') : '-')

            // Tell Yajra how to sort these formatted columns
            ->orderColumn('created_at', 'case_studies.created_at $1')
            ->orderColumn('updated_at', 'case_studies.updated_at $1')

            ->addColumn('action', fn ($c) => view('pages.case-studies._actions', compact('c'))->render())
            ->rawColumns(['action', 'image', 'document'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(CaseStudy $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('casestudy-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(1, 'desc')
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

            Column::make('created_at')->title('Created At'),
            Column::make('updated_at')->title('Updated At'),

            Column::make('image')->title('Image')
                ->searchable(false)->orderable(false),

            Column::make('document')->title('Document')
                ->searchable(false)->orderable(false),

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
        return 'CaseStudy_'.date('YmdHis');
    }
}
