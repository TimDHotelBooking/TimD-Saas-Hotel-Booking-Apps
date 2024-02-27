<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Users extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'phone_number',
        'created_by',
        'updated_by',
        'status'
    ];

    public function isSuperAdmin(){
        return $this->hasRole("Super Admin");
    }

    public function isPropertyAdmin(){
        return $this->hasRole("Property Admin");
    }

    public function isPropertyAgent(){
        return $this->hasRole("Property Agent");
    }

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            return asset('storage/' . $this->profile_photo_path);
        }

        return $this->profile_photo_path;
    }

    public function properties() {
        return $this->belongsToMany(Property::class,'property_agents','agent_id','property_id');
    }

    public function getRoleNameAttribute(){
        if ($this->isSuperAdmin()){
            return "Super Admin";
        }else if ($this->isPropertyAdmin()){
            return "Property Admin";
        }else if ($this->isPropertyAgent()){
            return "Property Agent";
        }else{
            return '';
        }
    }
}
