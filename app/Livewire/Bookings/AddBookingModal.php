<?php

namespace App\Livewire\Bookings;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Property;
use App\Models\Rooms;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddBookingModal extends Component
{
    public $booking_id;
    public $customer_id;
    public $room_id;
    public $agent_id;
    public $check_in_date;
    public $check_out_date;
    public $total_amount;

    public $edit_mode = false;

    protected $rules = [
        'customer_id' => 'required',
        'room_id' => 'required',
        'check_in_date' => 'required|date',
        'check_out_date' => 'required|date',
        'total_amount' => 'required|numeric',
    ];

    protected $listeners = [
        'delete_booking' => 'deleteBooking',
        'update_booking' => 'updateBooking',
    ];

    public function render()
    {
        $properties = Property::whereHas('agents',function ($query){
            $query->where('agent_id',Auth::user()->user_id);
        })->where('status',1)->pluck("property_id")->toArray();
        $rooms = Rooms::where('status',1)->whereIn('property_id',$properties)->get();
        $customers = Customers::where('status','1')->where('created_by',Auth::user()->user_id)->get();
        $agents = null;
        if (Auth::user()->isPropertyAdmin()){
            $agents = Users::role('Property Agent')
                ->where('created_by',Auth::user()->user_id)->get();
        }else if(Auth::user()->isSuperAdmin()){
            $agents = Users::role('Property Agent')->get();
        }
        return view('livewire.bookings.add-booking-modal',compact('customers','rooms','agents'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new booking

            $is_exists = Bookings::where("customer_id",$this->customer_id)
                                ->where("room_id",$this->room_id)
                                ->where("check_in_date",$this->check_in_date)
                                ->where("check_out_date",$this->check_out_date)
                                ->count();
            if ($is_exists > 0){
                $this->dispatch("error","customer bill is already generated for this dates and room");
                return;
            }
            $this->agent_id = Auth::user()->user_id;
            $data = [
                'customer_id' => $this->customer_id,
                'room_id' => $this->room_id,
                'check_in_date' => $this->check_in_date,
                'check_out_date' => $this->check_out_date,
                'total_amount' => $this->total_amount,
                'agent_id' => $this->agent_id,
                'status' => 1,
                'updated_by' => Auth::user()->user_id
            ];

            if (!$this->edit_mode) {
                $data['created_by'] = Auth::user()->user_id;
            }

            // Update or Create a new booking record in the database
            $booking = Bookings::find($this->booking_id) ?? Bookings::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $booking->$k = $v;
                }
                $booking->save();
            }

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->dispatch('success', __('Booking updated'));
            } else {

                // Emit a success event with a message
                $this->dispatch('success', __('New Booking created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteBooking($id)
    {
        // Delete the booking record with the specified ID
        Bookings::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Booking successfully deleted');
    }

    public function updateBooking($id)
    {
        $this->edit_mode = true;

        $booking = Bookings::find($id);
        $this->booking_id = $booking->booking_id;
        $this->customer_id = $booking->customer_id;
        $this->room_id = $booking->room_id;
        $this->agent_id = $booking->agent_id;
        $this->check_in_date = $booking->check_in_date;
        $this->check_out_date = $booking->check_out_date;
        $this->total_amount = $booking->total_amount;
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
