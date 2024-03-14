<?php

namespace App\DataTables;

use App\Models\Property;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TypeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('property_id', function (Type $type) {
            return !empty($type->property) ? $type->property->property_name ?? '-' : '-';
        })
            ->editColumn('created_at', function (Type $type) {
                return $type->created_at->format('d M Y, h:i a') ?? '-';
            })
           
            ->addColumn('status', function (Type $type) {
                return view('type.columns._status', compact('type'));
            }) 
            ->addColumn('action', function (Type $type) {
                return view('type.columns._actions', compact('type'));
            }) 
            
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Type $model): QueryBuilder
    {
        $query = $model->newQuery();
        if (Auth::user()->isPropertyAdmin()){
            $query->where('created_by',Auth::user()->user_id)->where('property_id',Auth::user()->property_id);
        }
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('type-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
                    ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
                    ->orderBy(0)
                    ->drawCallback("function() {" . file_get_contents(resource_path('views/type/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('type_id'),
            Column::make('property_id')->title("Property"),
            Column::make('type_name'),           
            Column::make('created_at'),
            Column::make('status'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Type_' . date('YmdHis');
    }
}
