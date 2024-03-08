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
        'description',
        'maximum_occupancy',                  
        'created_by',
        'updated_by',
        'status'
    ];
}
