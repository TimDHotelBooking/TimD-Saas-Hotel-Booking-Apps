<?php

namespace App\DataTables;

use App\Models\Rooms;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoomsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('property_id', function (Rooms $room) {
                return !empty($room->property) ? $room->property->property_name ?? '-' : '-';
            })
            ->editColumn('room_type_id', function (Rooms $room) {
                return !empty($room->type) ? $room->type->type_name ?? '-' : '-';
            })
            ->editColumn('created_at', function (Rooms $room) {
                return $room->created_at->format('d M Y, h:i a') ?? '-';
            })
            ->addColumn('action', function (Rooms $room) {
                return view('rooms.columns._actions', compact('room'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Rooms $model): QueryBuilder
    {
        $query = $model->newQuery();
        if (Auth::user()->isPropertyAdmin()){
            $query = $model->where('created_by',Auth::user()->user_id);
        }
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('rooms-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
                    ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
                    ->orderBy(0)
                    ->drawCallback("function() {" . file_get_contents(resource_path('views/rooms/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('room_id'),
            Column::make('property_id')->title("Property"),
            Column::make('room_type_id')->title("Room Type"),
            Column::make('availability_status')->title('Status'),
            Column::make('price'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-end text-nowrap'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Rooms_' . date('YmdHis');
    }
}
