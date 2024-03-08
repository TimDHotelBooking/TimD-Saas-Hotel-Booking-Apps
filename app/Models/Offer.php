<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'offers';
    protected $primaryKey = 'offer_id';
    protected $fillable = [
        'offer_id',
        'offer_name',
        'discount',
        'max_amount',
        'min_amount',
        'coupon_code',
        'description',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
