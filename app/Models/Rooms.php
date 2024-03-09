<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $primaryKey = 'room_id';
    protected $fillable = [
        'room_id',
        'property_id',
        'room_type_id',
        'availability_status',
        'price',
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

    public function tariffs(){
        return $this->hasMany(Tariff::class,'room_id');
    }

    public function type(){
        return $this->belongsTo(Type::class,'room_type_id');
    }
}
