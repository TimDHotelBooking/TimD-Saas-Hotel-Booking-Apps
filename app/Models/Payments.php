<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'booking_id',
        'amount_paid',
        'payment_date',
        'payment_method',
        'transaction_reference',
        'created_by',
        'updated_by',
        'status'
    ];
}
