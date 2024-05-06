<?php

namespace App\DataTables;

use App\Models\Property;
use App\Models\Tariff;
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

class TariffDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('property_id', function (Tariff $tariff) {
            return !empty($tariff->property) ? $tariff->property->property_name ?? '-' : '-';
        })
            ->editColumn('start_date', function (Tariff $tariff) {
                return Carbon::parse($tariff->start_date)->format('d M Y');
            })
            ->editColumn('end_date', function (Tariff $tariff) {
                return Carbon::parse($tariff->end_date)->format('d M Y');
            })
            ->editColumn('room_type', function (Tariff $tariff) {
                return view('tariff.columns._room_property', compact('tariff'));
            })
            ->editColumn('created_at', function (Tariff $tariff) {
                return $tariff->created_at->format('d M Y, h:i a') ?? '-';
            })
            ->addColumn('action', function (Tariff $tariff) {
                return view('tariff.columns._actions', compact('tariff'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Tariff $model): QueryBuilder
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
                    ->setTableId('tariff-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
                    ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
                    ->orderBy(0)
                    ->drawCallback("function() {" . file_get_contents(resource_path('views/tariff/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('tariff_id'),
            Column::make('property_id')->title("Property"),
            Column::make('room_type','room_type_id'),
            Column::make('start_date'),
            Column::make('end_date'),
            Column::make('price'),
            Column::make('holiday_price'),
            Column::make('promotional_price'),
            Column::make('created_at'),
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
        return 'Tariff_' . date('YmdHis');
    }
}
