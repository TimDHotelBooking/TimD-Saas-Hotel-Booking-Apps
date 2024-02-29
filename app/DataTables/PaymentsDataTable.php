<?php

namespace App\DataTables;

use App\Models\Payments;
use Carbon\Carbon;
use Faker\Provider\Payment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('customer', function (Payments $payment) {
                $booking = $payment->booking ?? null;
                if (empty($booking)){
                    return '-';
                }
                return !empty($booking->customer) ? $booking->customer->full_name ?? '-' : '-';
            })
            ->editColumn('room', function (Payments $payment) {
                $booking = $payment->booking ?? null;
                if (empty($booking)){
                    return '-';
                }
                return view('bookings.columns._room_property', compact('booking'));
            })
            ->editColumn('payment_date', function (Payments $payments) {
                $date = !empty($payments->payment_date) ? Carbon::parse($payments->payment_date) : null;
                if (empty($date)){
                    return '-';
                }
                return $date->format('d M Y, h:i a') ?? '-';
            })
            ->addColumn('action', function (Payments $payment) {
                return view('payments.columns._actions', compact('payment'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Payments $model): QueryBuilder
    {
        $query = $model->newQuery();
        if (Auth::user()->isPropertyAgent()){
            $query->where('created_by',Auth::user()->user_id);
        }
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('payments-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
                    ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
                    ->orderBy(0)
                    ->drawCallback("function() {" . file_get_contents(resource_path('views/payments/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('payment_id'),
            Column::make('booking_id')->title("Booking"),
            Column::make('customer',"booking_id"),
            Column::make('room','booking_id'),
            Column::make('amount_paid')->title('Amount'),
            Column::make('payment_method')->title('Payment Method'),
            Column::make('transaction_reference'),
            Column::make('payment_date'),
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
        return 'Payments_' . date('YmdHis');
    }
}
