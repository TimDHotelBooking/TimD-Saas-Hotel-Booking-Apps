<?php

namespace App\Livewire\Type;

use App\Models\Rooms;
use App\Models\Amenity;
use App\Models\TypeAmenity;
use App\Models\TypeFacility;
use App\Models\Property;
use App\Models\RoomList;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddTypeModal extends Component
{
    public $type_id;
    public $type_name; 
    public $description;  
    public $maximum_occupancy;
    public $amenity_id;
    //public $facility_id;
    public $status;
   

    public $edit_mode = false;

    protected $rules = [     
        
        "type_name" => "required",
        "description" => "required",
        "status"=>"required",
        "amenity_id"=>"required",
        //"facility_id"=>"required",
        "maximum_occupancy"=>"required"
    ];

    protected $listeners = [
        'delete_type' => 'deleteType',
        'update_type' => 'updateType',
    ];

    public function render()
    {
       

        $amenities = (new Amenity());
        if (Auth::user()->isPropertyAdmin()){
            $amenities->where('status',1);
        }
        $amenities = $amenities->get();
        return view('livewire.type.add-type-modal',compact('amenities'));
    }

    public function submit()
    {
        // Validate the form input data
       // dd($this->amenity_id);

        $this->validate();
        DB::transaction(function () {

            $is_exists = Type::where("property_id", Auth::user()->property_id)
            ->where("type_name", $this->type_name)->get()->count();
            if($is_exists > 0)
            {
                $this->dispatch('error', __('Rooms Type already exists with selected property'));
                return;
            }


            // Prepare the data for creating a new property
            $data = [
                'property_id' =>  Auth::user()->property_id,
                'type_name' => $this->type_name, 
                'description' => $this->description,                    
                'status' => $this->status,
                'maximum_occupancy'=>$this->maximum_occupancy,
                'updated_by' => Auth::user()->user_id
            ];

            if (!$this->edit_mode) {
                $data['created_by'] = Auth::user()->user_id;
            }

            // Update or Create a new property record in the database
            $type = Type::find($this->type_id) ?? Type::create($data);

            $type_id = $type->type_id;
           
            TypeAmenity::where('type_id',$type_id)->delete();
            $all_amenity_id = $this->amenity_id;
            if(count($all_amenity_id) > 0)
            {
                foreach($all_amenity_id as $amenity_id)
                {
                    TypeAmenity::create(['type_id'=>$type_id,'amenity_id'=>$amenity_id]);
                }
            } 

            // TypeFacility::where('type_id',$type_id)->delete();
            // $all_facility_id = $this->facility_id;
            // if(count($all_facility_id) > 0)
            // {
            //     foreach($all_facility_id as $amenity_id)
            //     {
            //         TypeFacility::create(['type_id'=>$type_id,'amenity_id'=>$amenity_id]);
            //     }
            // }

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $type->$k = $v;
                }
                $type->save();
            }

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->dispatch('success', __('Type updated'));
            } else {

                // Emit a success event with a message
                $this->dispatch('success', __('New Type created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteType($id)
    {
        RoomList::where('room_type_id',$id)->delete();
        Rooms::where('room_type_id',$id)->delete();
        TypeAmenity::where('type_id',$id)->delete();
        TypeFacility::where('type_id',$id)->delete();
        // Delete the property record with the specified ID
        Type::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Type successfully deleted');
    }

    public function updateType($id)
    {
        $this->edit_mode = true;

        $type = Type::find($id);
        $this->type_id = $type->type_id;
        $this->type_name = $type->type_name; 
        $this->description = $type->description;   
        $this->maximum_occupancy = $type->maximum_occupancy;    
        $this->status = $type->status;

        $all_amenity_id = TypeAmenity::where('type_id',$type->type_id)->get();
        $existing_ids = [];
        if($all_amenity_id->count() > 0)
        {
            foreach($all_amenity_id as $all_amenity_id_value)
            {
                $existing_ids[]=$all_amenity_id_value->amenity_id;
            }
        }
        $this->amenity_id = $existing_ids;

        // $all_facility_id = TypeFacility::where('type_id',$type->type_id)->get();
        // $existing_ids_2 = [];
        // if($all_facility_id->count() > 0)
        // {
        //     foreach($all_facility_id as $all_amenity_id_value)
        //     {
        //         $existing_ids_2[]=$all_amenity_id_value->amenity_id;
        //     }
        // }
        // $this->facility_id = $existing_ids_2;
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
