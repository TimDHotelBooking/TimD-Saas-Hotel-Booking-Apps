<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'booking_id',
        'property_id',
        'room_list_id',
        'check_in_date',
        'check_out_date',
        'room_type_id',
    ];
}
