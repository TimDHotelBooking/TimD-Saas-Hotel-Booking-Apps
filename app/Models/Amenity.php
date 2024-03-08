<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $table = 'amenities';
    protected $primaryKey = 'amenity_id';
    protected $fillable = [
        'amenity_id',
        'amenity_name',           
        'created_by',
        'updated_by',
        'status'
    ];


}