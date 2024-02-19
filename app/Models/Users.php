<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'password',
        'role_id',
        'created_by',
        'updated_by',
        'status'
    ];

    public function role(){
        return $this->belongsTo(Roles::class,'role_id','role_id');
    }
}
