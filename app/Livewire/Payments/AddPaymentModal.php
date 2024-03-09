<?php

namespace App\Livewire\Payments;

use App\Models\Bookings;
use App\Models\Payments;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddPaymentModal extends Component
{
    public $payment_id;
    public $booking_id;
    public $amount_paid;
    public $payment_date;
    public $payment_method;
    public $transaction_reference;
    public $status;

    public $edit_mode = false;

    protected $rules = [
        'booking_id' => 'required',
        'payment_date' => 'required',
        'payment_method' => 'required|string',
        'transaction_reference' => 'required|string',
    ];

    protected $listeners = [
        'delete_payment' => 'deletePayment',
        'update_payment' => 'updatePayment',
    ];

    public function render()
    {
        $bookings = Bookings::where('created_by',Auth::user()->user_id)->get();
        return view('livewire.payments.add-payment-modal',compact('bookings'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new payment

            if (!empty($this->booking_id)){
                $booking = Bookings::find($this->booking_id);
                $old_payment = Payments::where('booking_id',$booking->booking_id)->sum('amount_paid') ?? 0;
                $total_pending_paid_amount = $booking->total_amount - $old_payment;
            }
            $data = [
                'booking_id' => $this->booking_id,
                'amount_paid' => (!$this->edit_mode) ? $total_pending_paid_amount ?? 0 : $this->amount_paid,
                'payment_method' => $this->payment_method,
                'payment_date' => $this->payment_date,
                'transaction_reference' => $this->transaction_reference,
                'status' => Payments::STATUS_NOT_PAID,
                'updated_by' => Auth::user()->user_id
            ];

            if (!$this->edit_mode) {
                $data['created_by'] = Auth::user()->user_id;
            }

            // Update or Create a new payment record in the database
            $payment = Payments::find($this->payment_id) ?? Payments::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $payment->$k = $v;
                }
                $payment->save();
            }

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->dispatch('success', __('Payment updated'));
            } else {

                // Emit a success event with a message
                $this->dispatch('success', __('New Payment created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deletePayment($id)
    {
        // Delete the payment record with the specified ID
        Payments::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Payment successfully deleted');
    }

    public function updatePayment($id)
    {
        $this->edit_mode = true;

        $payment = Payments::find($id);
        $this->payment_id = $payment->payment_id;
        $this->booking_id = $payment->booking_id;
        $this->amount_paid = $payment->amount_paid;
        $this->payment_method = $payment->payment_method;
        $this->payment_date = $payment->payment_date;
        $this->transaction_reference = $payment->transaction_reference;
        $this->status = $payment->status;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function dismiss(){
        $this->reset();
        $this->edit_mode = false;
    }
}
