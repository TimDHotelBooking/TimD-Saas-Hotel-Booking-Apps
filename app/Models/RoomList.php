<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomList extends Model
{
    use HasFactory;
    protected $table = 'room_lists';
    protected $primaryKey = 'room_list_id';
    protected $fillable = [
        'room_list_id',
        'room_id',
        'property_id',
        'room_type_id',
        'availability_status',
        'room_number',
        'floor',
        'no_of_rooms',
        'created_by',
        'updated_by',
        'status'
    ];

    const AVAILABLE_STATUS = 'Available';
    const BOOKED_STATUS = 'Booked';
    const OCCUPIED_STATUS = 'Occupied';
    const MAINTENANCE_STATUS = 'Maintenance';
    const CLEANING_STATUS = 'Cleaning';


    public function property(){
        return $this->belongsTo(Property::class,'property_id');
    }

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }

    public function type(){
        return $this->belongsTo(Type::class,'room_type_id');
    }
}
