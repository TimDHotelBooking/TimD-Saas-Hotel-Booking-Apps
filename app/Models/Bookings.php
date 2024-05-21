<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';
    protected $fillable = [
        'booking_id',
        'customer_id',
        'document_number',
        'room_id',
        'check_in_date',
        'check_out_date',
        'total_amount',
        'no_of_guests',
        'no_of_rooms',
        'payment_method',
        'special_requests',
        'agent_id',
        'created_by',
        'updated_by',
        'status'
    ];

    public function customer(){
        return $this->belongsTo(Customers::class,'customer_id');
    }

    public function room(){
        return $this->belongsTo(Rooms::class,'room_id');
    }

    public function agent(){
        return $this->belongsTo(Users::class,'agent_id');
    }

    public function getFullDetailsAttribute(){
        $name = $this->booking_id;
        if (!empty($this->room) && !empty($this->room->property) && !empty($this->room->type)){
            $name .= " - ". ($this->room->property->property_name ?? '') .' - '. ($this->room->type->type_name ?? '');
        }
        if (!empty($this->customer)){
            $name .= " - " .$this->customer->full_name;
        }
        return $name;
    }

    public function booking_detail()
    {
        return $this->hasMany(BookingDetail::class,'booking_id','booking_id');
    }
}
