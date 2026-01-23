<?php

namespace App\DataTables;

use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PortfolioDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('category', fn($portfolio) => $portfolio->category->name ?? '-')
            ->editColumn('is_active', function ($portfolio) {
                if ($portfolio->is_active) {
                    return '<span class="badge badge-success">Active</span>';
                }
                return '<span class="badge badge-danger">Inactive</span>';
            })
            ->editColumn('thumbnail', function ($portfolio) {
                if (!$portfolio->thumbnail) {
                    return '-';
                }

                $url = asset('storage/portfolios/thumbnails/' . $portfolio->thumbnail);

                return '<img src="' . $url . '" alt="Thumbnail" width="60" height="60" style="object-fit: cover; border-radius: 5px;">';
            })
            ->addColumn('gallery_count', fn($portfolio) => count($portfolio->gallery_images ?? []))
            ->editColumn('created_at', fn($portfolio) => Carbon::parse($portfolio->created_at)->format('d-M-Y'))
            ->editColumn('updated_at', fn($portfolio) => $portfolio->updated_at ? Carbon::parse($portfolio->updated_at)->format('d-M-Y') : '-')
            ->orderColumn('created_at', 'portfolios.created_at $1')
            ->orderColumn('updated_at', 'portfolios.updated_at $1')
            ->addColumn('action', fn($portfolio) => view('pages.portfolios._actions', compact('portfolio'))->render())
            ->rawColumns(['action', 'is_active', 'thumbnail'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Portfolio $model): QueryBuilder
    {
        return $model->newQuery()->with('category');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('portfolio-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(7, 'desc')
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
            Column::make('category')->title('Category'),
            Column::make('title')->title('Title'),
            Column::make('slug')->title('Slug'),
            Column::make('sub_title')->title('Sub Title'),
            Column::make('thumbnail')->title('Thumbnail'),
            Column::make('gallery_count')->title('Gallery Images'),
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
        return 'Portfolio_' . date('YmdHis');
    }
}