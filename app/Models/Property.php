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

    const AVAILABLE_STATUS = 'Available';
    const BOOKED_STATUS = 'Booked';
    const OCCUPIED_STATUS = 'Occupied';
    const MAINTENANCE_STATUS = 'Maintenance';
    const CLEANING_STATUS = 'Cleaning';

    public function admin(){
        return $this->hasOne(Users::class,"user_id","property_admin_id");
    }

    public function agents() {
        return $this->belongsToMany(Users::class,'property_agents','property_id','agent_id');
    }

    public function rooms() {
        return $this->hasMany(Rooms::class,"property_id");
    }
}
