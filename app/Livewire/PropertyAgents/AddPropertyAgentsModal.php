<?php

namespace App\Livewire\PropertyAgents;

use App\Models\Property;
use App\Models\PropertyAgents;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddPropertyAgentsModal extends Component
{
    public $property_agent_id;
    public $property_id;
    public $agent_id;

    public $edit_mode = false;

    protected $rules = [
        'property_id' => 'required',
        'agent_id' => 'required',
    ];

    protected $listeners = [
        'delete_property_agent' => 'deletePropertyAgent',
        'update_property_agent' => 'updatePropertyAgent',
    ];

    public function render()
    {
        $properties = Property::where('status','1');
        $agents = Users::where('status','1')->role('Property Agent');
        if (Auth::user()->isPropertyAdmin()){
            $properties = $properties->where('property_admin_id',Auth::user()->user_id);
            $agents = $agents->where('created_by',Auth::user()->user_id);
        }
        $properties = $properties->get();
        $agents = $agents->get();
        return view('livewire.property-agents.add-property-agents-modal',compact('properties','agents'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new property
            $data = [
                'property_id' => $this->property_id,
                'agent_id' => $this->agent_id,
                'updated_by' => Auth::user()->user_id
            ];

            if (!$this->edit_mode) {
                $data['created_by'] = Auth::user()->user_id;
            }
            if (!empty($this->property_id) && !empty($this->agent_id)){
                $is_exists = PropertyAgents::where('property_id',$this->property_id)
                ->where('agent_id',$this->agent_id)->first();
                if (!empty($is_exists)){
                    $this->dispatch('error', __('Property Agent already exists'));
                    return;
                }
            }

            // Update or Create a new property record in the database
            $property = PropertyAgents::find($this->property_agent_id) ?? PropertyAgents::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $property->$k = $v;
                }
                $property->save();
            }

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->dispatch('success', __('Property Agent updated'));
            } else {

                // Emit a success event with a message
                $this->dispatch('success', __('New Property Agent created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deletePropertyAgent($id)
    {
        // Delete the property record with the specified ID
        PropertyAgents::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Property Agent successfully deleted');
    }

    public function updatePropertyAgent($id)
    {
        $this->edit_mode = true;

        $property = PropertyAgents::find($id);
        $this->property_agent_id = $property->property_agent_id;
        $this->property_id = $property->property_id;
        $this->agent_id = $property->agent_id;
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
