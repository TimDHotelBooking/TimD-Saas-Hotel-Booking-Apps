<?php

namespace App\Livewire\Rooms;

use App\Models\Property;
use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddRoomsModal extends Component
{
    public $room_id;
    public $property_id;
    public $room_type;
    public $availability_status;
    public $price;

    public $edit_mode = false;

    protected $rules = [
        'property_id' => "required",
        "room_type" => "required|string",
        "availability_status" => "required",
        "price" => "required",
    ];

    protected $listeners = [
        'delete_rooms' => 'deleteRooms',
        'update_rooms' => 'updateRooms',
    ];

    public function render()
    {
        $properties = Property::where('status',1);
        if (!Auth::user()->isSuperAdmin()){
            $properties->where('property_admin_id',Auth::user()->user_id);
        }


        $properties = $properties->get();
        return view('livewire.rooms.add-rooms-modal',compact('properties'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();
        DB::transaction(function () {
            // Prepare the data for creating a new property
            $data = [
                'property_id' => $this->property_id,
                'room_type' => $this->room_type,
                'availability_status' => $this->availability_status,
                'price' => $this->price,
                'status' => $this->availability_status,
                'updated_by' => Auth::user()->user_id
            ];

            if (!$this->edit_mode) {
                $data['created_by'] = Auth::user()->user_id;
            }

            // Update or Create a new property record in the database
            $room = Rooms::find($this->room_id) ?? Rooms::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $room->$k = $v;
                }
                $room->save();
            }

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->dispatch('success', __('Rooms updated'));
            } else {

                // Emit a success event with a message
                $this->dispatch('success', __('New Rooms created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteRooms($id)
    {
        // Delete the property record with the specified ID
        Rooms::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Room successfully deleted');
    }

    public function updateRooms($id)
    {
        $this->edit_mode = true;

        $room = Rooms::find($id);
        $this->room_id = $room->room_id;
        $this->property_id = $room->property_id;
        $this->room_type = $room->room_type;
        $this->availability_status = $room->availability_status;
        $this->price = $room->price;
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
