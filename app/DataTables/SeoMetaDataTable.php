<?php

namespace App\DataTables;

use App\Helpers\pageHelper;
use App\Models\SeoMeta;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SeoMetaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('page_name', function ($seoMeta) {
                $labels = pageHelper::labels();
                return $labels[$seoMeta->page_name] ?? $seoMeta->page_name;
            })
            ->editColumn('is_active', function ($seoMeta) {
                if ($seoMeta->is_active) {
                    return '<span class="badge badge-success">Active</span>';
                }
                return '<span class="badge badge-danger">Inactive</span>';
            })
            ->editColumn('created_at', fn($seoMeta) => Carbon::parse($seoMeta->created_at)->format('d-M-Y'))
            ->editColumn('updated_at', fn($seoMeta) => $seoMeta->updated_at ? Carbon::parse($seoMeta->updated_at)->format('d-M-Y') : '-')
            ->orderColumn('created_at', 'seo_meta.created_at $1')
            ->orderColumn('updated_at', 'seo_meta.updated_at $1')
            ->addColumn('action', fn($seoMeta) => view('pages.seo-meta._actions', compact('seoMeta'))->render())
            ->rawColumns(['action', 'is_active'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SeoMeta $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('seo-meta-table')
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
            Column::make('page_name')->title('Page'),
            Column::make('meta_title')->title('Meta Title'),
            Column::make('meta_keywords')->title('Meta Keywords'),
            Column::make('meta_description')->title('Meta Description'),
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
        return 'SeoMeta_' . date('YmdHis');
    }
}
