<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'payment_id',
        'booking_id',
        'amount_paid',
        'payment_date',
        'payment_method',
        'transaction_reference',
        'created_by',
        'updated_by',
        'photo',
        'status'
    ];

    const STATUS_FULLY_PAID = "Fully Paid";
    const STATUS_NOT_PAID = "Not Paid";
    const STATUS_PARTIALLY_PAID = "Partially Paid";

    public function booking(){
        return $this->belongsTo(Bookings::class,'booking_id');
    }
}
