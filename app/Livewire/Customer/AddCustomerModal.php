<?php

namespace App\Livewire\Customer;

use App\Models\CustomerProperty;
use App\Models\Customers;
use App\Models\PropertyAgents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddCustomerModal extends Component
{
    public $customer_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $status;
    public $address;

    public $edit_mode = false;

    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|string',
        'phone_number' => 'required|string',
        'address' => 'required'
    ];

    protected $listeners = [
        'delete_customer' => 'deleteCustomer',
        'update_customer' => 'updateCustomer',
        'customer_already_added' => 'customerAlreadyAdded',
    ];

    public function render()
    {
        return view('livewire.customer.add-customer-modal');
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new customer
            $data = [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'status' => $this->status,
                'updated_by' => Auth::user()->user_id,
                'address' => $this->address
            ];

            if (!$this->edit_mode) {
                $data['created_by'] = Auth::user()->user_id;
            }

            // Update or Create a new customer record in the database
            $customer = Customers::find($this->customer_id) ?? Customers::create($data);
            $id = auth()->user()->user_id;
            $property_agent = PropertyAgents::where('agent_id',$id)->first();

            if($customer->wasRecentlyCreated)
            {
                CustomerProperty::create([
                    'property_id' => $property_agent->property_id,
                    'customer_id' => $customer->customer_id,
                ]);
            }

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $customer->$k = $v;
                }
                $customer->save();
            }

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->dispatch('success', __('Customer updated'));
            } else {

                // Emit a success event with a message
                $this->dispatch('success', __('New Customer created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteCustomer($id)
    {
        // Delete the customer record with the specified ID
        Customers::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Customer successfully deleted');
    }

    public function updateCustomer($id)
    {
        $this->edit_mode = true;

        $customer = Customers::find($id);
        $this->customer_id = $customer->customer_id;
        $this->first_name = $customer->first_name;
        $this->last_name = $customer->last_name;
        $this->email = $customer->email;
        $this->phone_number = $customer->phone_number;
        $this->status = $customer->status;
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
