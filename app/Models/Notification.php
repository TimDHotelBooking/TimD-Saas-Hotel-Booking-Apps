<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
      'notification_id',
      'user_id',
      'notification_type',
      'message',
      'is_read',
    ];
}
