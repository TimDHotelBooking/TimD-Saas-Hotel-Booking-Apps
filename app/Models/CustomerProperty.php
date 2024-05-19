<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerProperty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =  [
        'property_id',
        'customer_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
