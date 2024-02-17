<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    use HasFactory;

    protected $fillable = [
      'agent_id',
      'first_name',
      'last_name',
      'email',
      'phone_number',
      'property_id',
    ];
}
