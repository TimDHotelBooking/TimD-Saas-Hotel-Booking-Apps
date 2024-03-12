<?php

namespace App\Livewire\Tariff;

use App\Models\Type;
use App\Models\Tariff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddTariffModal extends Component
{
    public $tariff_id;
    public $room_type_id;
    public $start_date;
    public $end_date;
    public $price;
    public $holiday_price;
    public $promotional_price;
    public $status;

    public $edit_mode = false;

    protected $rules = [
        "room_type_id" => "required",
        "start_date" => "required|date",
        "end_date" => "required|date",
        "price" => "required",
    ];

    protected $listeners = [
        'delete_tariff' => 'deleteTariff',
        'update_tariff' => 'updateTariff',
    ];

    public function render()
    {
        $room_types = (new Type());
        if (Auth::user()->isPropertyAdmin()){
            $room_types->where('created_by',Auth::user()->user_id);
        }
        $room_types = $room_types->get();
        return view('livewire.tariff.add-tariff-modal',compact('room_types'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();
        DB::transaction(function () {
            // Prepare the data for creating a new property
            $data = [
                'room_type_id' => $this->room_type_id,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'price' => $this->price,
                'holiday_price' => $this->holiday_price,
                'promotional_price' => $this->promotional_price,
                'status' => $this->status,
                'updated_by' => Auth::user()->user_id
            ];

            if (!$this->edit_mode) {
                $data['created_by'] = Auth::user()->user_id;
            }

            // Update or Create a new property record in the database
            $room = Tariff::find($this->tariff_id) ?? Tariff::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $room->$k = $v;
                }
                $room->save();
            }

            if ($this->edit_mode) {

                // Emit a success event with a message
                $this->dispatch('success', __('Tariff updated'));
            } else {

                // Emit a success event with a message
                $this->dispatch('success', __('New Tariff created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteTariff($id)
    {
        // Delete the property record with the specified ID
        Tariff::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Tariff successfully deleted');
    }

    public function updateTariff($id)
    {
        $this->edit_mode = true;

        $tariff = Tariff::find($id);
        $this->tariff_id = $tariff->tariff_id;
        $this->room_type_id = $tariff->room_type_id;
        $this->start_date = $tariff->start_date;
        $this->end_date = $tariff->end_date;
        $this->price = $tariff->price;
        $this->holiday_price = $tariff->holiday_price;
        $this->promotional_price = $tariff->promotional_price;
        $this->status = $tariff->status;
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
