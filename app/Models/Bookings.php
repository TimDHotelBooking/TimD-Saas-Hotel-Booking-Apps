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
        'room_id',
        'check_in_date',
        'check_out_date',
        'total_amount',
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
}
