<?php

namespace App\DataTables;

use App\Models\Bookings;
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

class BookingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('customer_id', function (Bookings $booking) {
                return !empty($booking->customer) ? $booking->customer->full_name ?? '-' : '-';
            })
            ->editColumn('room_id', function (Bookings $booking) {
                return view('bookings.columns._room_property', compact('booking'));
            })
            ->editColumn('check_in_date', function (Bookings $booking) {
                $checkInDate = Carbon::parse($booking->check_in_date);
                return !empty($checkInDate) ? $checkInDate->format('d M Y') ?? '-' : '-';
            })
            ->editColumn('check_out_date', function (Bookings $booking) {
                $checkOutDate = Carbon::parse($booking->check_out_date);
                return !empty($checkOutDate) ? $checkOutDate->format('d M Y') ?? '-' : '-';
            })
            ->editColumn('created_at', function (Bookings $booking) {
                return $booking->created_at->format('d M Y, h:i a') ?? '-';
            })
            ->addColumn('action', function (Bookings $booking) {
                return view('bookings.columns._actions', compact('booking'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Bookings $model): QueryBuilder
    {
        $query = $model->newQuery();
        if (!Auth::user()->isSuperAdmin()){
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
                    ->setTableId('booking-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
                    ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
                    ->orderBy(0)
                    ->drawCallback("function() {" . file_get_contents(resource_path('views/bookings/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('booking_id'),
            Column::make('customer_id'),
            Column::make('room_id'),
            Column::make('check_in_date'),
            Column::make('check_out_date'),
            Column::make('total_amount'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-end text-nowrap')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Booking_' . date('YmdHis');
    }
}
