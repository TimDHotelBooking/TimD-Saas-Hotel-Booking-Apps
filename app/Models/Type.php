<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $primaryKey = 'type_id';
    protected $fillable = [
        'type_id',
        'type_name', 
        'property_id',
        'description',
        'maximum_occupancy',                  
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
        return $this->hasMany(Tariff::class,'room_type_id');
    }
    public function type_amenity(){
        return $this->hasMany(TypeAmenity::class, 'type_id','type_id');
    }
}
