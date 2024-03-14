<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    protected $table = 'tariff';
    protected $primaryKey = 'tariff_id';
    protected $fillable = [
        'tariff_id',
        'room_type_id',
        'property_id',
        'start_date',
        'end_date',
        'price',
        'holiday_price',
        'promotional_price',
        'created_by',
        'updated_by',
        'status'
    ];

    public function room_type(){
        return $this->belongsTo(Type::class,'room_type_id');
    }
    public function property(){
        return $this->belongsTo(Property::class,'property_id');
    }
}
