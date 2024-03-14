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

    
    public function property(){
        return $this->belongsTo(Property::class,'property_id');
    }

}
