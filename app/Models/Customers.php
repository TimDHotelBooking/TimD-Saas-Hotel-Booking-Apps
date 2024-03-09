<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'company_name',
        'gst',
        'address',
        'created_by',
        'updated_by',
        'status'
    ];

    public function getFullNameAttribute(){
        return (($this->first_name ?? '') .' '. ($this->last_name ?? ''));
    }
}
