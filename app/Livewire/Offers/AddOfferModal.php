<?php

namespace App\Livewire\Offers;

use App\Models\Offer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddOfferModal extends Component
{
    public $offer_id;
    public $offer_name;
    public $discount;
    public $max_amount;
    public $min_amount;
    public $coupon_code;
    public $description;
    public $status;


    public $edit_mode = false;

    protected $rules = [
        'offer_name' => 'required',
        'discount' => 'required',
        'max_amount' => 'required',
        'min_amount' => 'required',
        'coupon_code' => 'required',
        'status' => 'required'
    ];

    public function render()
    {
        $offer = Offer::where('status',1);
        if (Auth::user()->isPropertyAdmin()){
            $offer->where('created_by',Auth::user()->user_id);
        }


        $offer = $offer->get();
        return view('livewire.offers.add-offer-modal');
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new property
            $data = [
                'offer_name' => $this->offer_name,
                'discount' => $this->discount,
                'max_amount' => $this->max_amount,
                'min_amount' => $this->min_amount,
                'coupon_code' => $this->coupon_code,
                'description' => $this->description,
                'status' => $this->status,
                'updated_by' => Auth::user()->user_id
            ];



            if (!$this->edit_mode) {
                $data['created_by'] = Auth::user()->user_id;
            }

            // Update or Create a new property record in the database
            $offer = Offer::find($this->offer_id) ?? Offer::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $offer->$k = $v;
                }
                $offer->save();
            }

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->dispatch('success', __('Offer updated'));
            } else {

                // Emit a success event with a message
                $this->dispatch('success', __('New Offer created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function dismiss()
    {
        $this->reset();
        $this->edit_mode = false;
    }
}
