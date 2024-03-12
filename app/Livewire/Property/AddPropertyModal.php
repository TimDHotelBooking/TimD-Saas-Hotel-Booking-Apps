<?php

namespace App\Livewire\Property;

use App\Models\AgentsProperty;
use App\Models\Property;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Spatie\Permission\Models\Role;

class AddPropertyModal extends Component
{
    use WithFileUploads;

    public $admin_id;
    public $property_id;
    public $property_name;
    public $location;
    public $contact_information;
    public $photo;
    public $save_photo;
    public $status;

    public $edit_mode = false;

    protected $rules = [
        'admin_id' => 'required',
        'property_name' => 'required|string',
        'location' => 'required|string',
        'contact_information' => 'required|string',
        'status' => 'required',
        'photo' => 'nullable|sometimes|image|max:5120',
    ];

    protected $listeners = [
        'delete_property' => 'deleteProperty',
        'update_property' => 'updateProperty',
    ];

    public function render()
    {

        if (Auth::user()->isPropertyAdmin()) {
            $this->admin_id = Auth::user()->user_id;
        }
        $property_admins = Users::role('Property Admin')->get();
        return view('livewire.property.add-property-modal', compact('property_admins'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new property
            $data = [
                'property_admin_id' => (Auth::user()->isPropertyAdmin()) ? Auth::user()->user_id : $this->admin_id,
                'property_name' => $this->property_name,
                'location' => $this->location,
                'contact_information' => $this->contact_information,
                'status' => $this->status,
                'updated_by' => Auth::user()->user_id,
            ];

            if ($this->photo) {

                $directory = 'public/properties';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }

                $filename = uniqid() . '.' . $this->photo->getClientOriginalExtension();
                $path = $this->photo->storeAs('public/properties', $filename);
                $data['photo'] = 'properties/' . $filename;
            } else {
                $data['photo'] = null;
            }


            if (!$this->edit_mode) {
                $data['created_by'] = Auth::user()->user_id;
            }

            // Update or Create a new property record in the database
            $property = Property::find($this->property_id) ?? Property::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $property->$k = $v;
                }
                $property->save();
            }

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->dispatch('success', __('Property updated'));
            } else {

                // Emit a success event with a message
                $this->dispatch('success', __('New Property created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteProperty($id)
    {
        // Delete the property record with the specified ID
        Property::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Property successfully deleted');
    }

    public function updateProperty($id)
    {
        $this->edit_mode = true;

        $property = Property::find($id);
        $this->property_id = $property->property_id;
        $this->admin_id = $property->property_admin_id;
        $this->property_name = $property->property_name;
        $this->location = $property->location;
        $this->contact_information = $property->contact_information;
        $this->status = $property->status;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function dismiss()
    {
        $this->reset();
        $this->edit_mode = false;
    }
}
