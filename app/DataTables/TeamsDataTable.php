<?php

namespace App\DataTables;

use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TeamsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('image', function ($t) {
                if (!$t->image) return '-';

                $src = asset('storage/teams/' . $t->image);
                $alt = e($t->image_alt ?? $t->name ?? 'team');

                return '<img src="'.$src.'" alt="'.$alt.'" style="width:50px;height:50px;object-fit:cover;border-radius:10px;">';
            })

            ->editColumn('is_active', function ($t) {
                return $t->is_active
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })

            ->editColumn('created_at', fn ($t) => $t->created_at ? Carbon::parse($t->created_at)->format('d-M-Y') : '-')
            ->editColumn('updated_at', fn ($t) => $t->updated_at ? Carbon::parse($t->updated_at)->format('d-M-Y') : '-')

            // Tell Yajra how to sort these formatted columns
            ->orderColumn('created_at', 'teams.created_at $1')
            ->orderColumn('updated_at', 'teams.updated_at $1')

            ->addColumn('action', fn ($t) => view('pages.teams._actions', compact('t'))->render())

            ->rawColumns(['image', 'is_active', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Team $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('teams-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(5, 'asc') // sort_order column index (adjust if you change columns order)
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
            Column::make('designation')->title('Designation'),
            Column::make('email')->title('Email'),
            Column::make('phone')->title('Phone'),

            Column::make('sort_order')->title('Sort Order'),
            Column::make('is_active')->title('Status')->orderable(true)->searchable(false),

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
        return 'Teams_' . date('YmdHis');
    }
}