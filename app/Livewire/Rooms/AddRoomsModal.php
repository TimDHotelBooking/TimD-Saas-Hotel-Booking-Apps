<?php

namespace App\Livewire\Rooms;

use App\Models\Property;
use App\Models\Rooms;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddRoomsModal extends Component
{
    public $room_id;
    public $property_id;
    public $room_type_id;
    public $availability_status;
    public $status;
    public $price;
    public $no_of_rooms;

    public $edit_mode = false;

    protected $rules = [
        'property_id' => "required",
        "room_type_id" => "required",
        "availability_status" => "required",
        "price" => "required",
        "status" => "required"
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
        $room_types = Type::where('status',1)->get();
        return view('livewire.rooms.add-rooms-modal',compact('properties','room_types'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();
        DB::transaction(function () {
            // Prepare the data for creating a new property
            $is_exists = Rooms::where("property_id",$this->property_id)
                ->where("room_type_id",$this->room_type_id)->first();
            if (($this->edit_mode && $is_exists->room_id != $this->room_id) || empty(!$this->edit_mode) && !empty($is_exists)){
                $this->dispatch('error', __('Rooms already exists with selected property'));
                return;
            }
            $data = [
                'property_id' => $this->property_id,
                'room_type_id' => $this->room_type_id,
                'availability_status' => $this->availability_status,
                'price' => $this->price,
                'no_of_rooms' => $this->no_of_rooms,
                'status' => $this->status,
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
        $this->room_type_id = $room->room_type_id;
        $this->availability_status = $room->availability_status;
        $this->price = $room->price;
        $this->no_of_rooms = $room->no_of_rooms;
        $this->status = $room->status;
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
