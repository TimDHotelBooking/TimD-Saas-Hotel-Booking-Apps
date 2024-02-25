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

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            return asset('storage/' . $this->profile_photo_path);
        }

        return $this->profile_photo_path;
    }
}
