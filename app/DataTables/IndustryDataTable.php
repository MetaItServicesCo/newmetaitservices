<?php

namespace App\DataTables;

use App\Models\Industry;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class IndustryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('image', function ($industry) {
                if (!$industry->image) return '-';

                $src = asset('storage/' . $industry->image);
                $alt = e($industry->image_alt ?? $industry->name ?? 'industry');

                return '<img src="'.$src.'" alt="'.$alt.'" style="width:50px;height:50px;object-fit:cover;border-radius:10px;">';
            })

            ->editColumn('created_at', fn ($industry) => $industry->created_at ? Carbon::parse($industry->created_at)->format('d-M-Y') : '-')
            ->editColumn('updated_at', fn ($industry) => $industry->updated_at ? Carbon::parse($industry->updated_at)->format('d-M-Y') : '-')

            // Tell Yajra how to sort these formatted columns
            ->orderColumn('created_at', 'industries.created_at $1')
            ->orderColumn('updated_at', 'industries.updated_at $1')

            ->addColumn('action', fn ($industry) => view('pages.industries._action', compact('industry'))->render())

            ->rawColumns(['image', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Industry $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('industry-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(3, 'desc') // Order by created_at descending
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
            Column::make('image')->title('Image')->orderable(false)->searchable(false),
            Column::make('name')->title('Name'),
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
        return 'Industry_' . date('YmdHis');
    }
}
