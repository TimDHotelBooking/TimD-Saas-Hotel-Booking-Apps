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
        'room_type',
        'availability_status',
        'price',
        'created_by',
        'updated_by',
        'status'
    ];

    public function property(){
        return $this->belongsTo(Property::class,'property_id');
    }
}
