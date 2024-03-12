<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFacility extends Model
{
    use HasFactory;
    protected $table = 'type_facilities';
    protected $primaryKey = 'type_amenity_id';
    protected $fillable = [
        'type_amenity_id',
        'type_id', 
        'amenity_id',                        
        'created_by',
        'updated_by',
        'status'
    ];
    public function type(){
        return $this->belongsTo(Type::class,'type_id');
    }
    public function amenity(){
        return $this->belongsTo(Amenity::class,'amenity_id');
    }
}
