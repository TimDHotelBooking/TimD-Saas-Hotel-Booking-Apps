<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'property';
    protected $primaryKey = 'property_id';
    protected $fillable = [
        "property_id",
        "property_admin_id",
        "property_name",
        "location",
        "contact_information",
        'created_by',
        'updated_by',
        'status'
    ];

    public function agent(){
        return $this->hasOne(Users::class,"user_id","property_admin_id");
    }
}
