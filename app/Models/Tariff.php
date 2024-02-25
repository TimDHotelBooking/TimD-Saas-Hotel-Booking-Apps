<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    protected $table = 'tariff';
    protected $primaryKey = 'tariff_id';
    protected $fillable = [
        'tariff_id',
        'room_id',
        'start_date',
        'end_date',
        'price',
        'created_by',
        'updated_by',
        'status'
    ];

    public function room(){
        return $this->belongsTo(Rooms::class,'room_id');
    }
}
