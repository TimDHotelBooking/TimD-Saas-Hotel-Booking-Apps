<?php

namespace App\Livewire\Offers;

use Livewire\Component;

class AddOfferModal extends Component
{
    public $offer_id;

    public $edit_mode = false;

    public function render()
    {
        return view('livewire.offers.add-offer-modal');
    }

    public function dismiss(){
        $this->reset();
        $this->edit_mode = false;
    }
}
