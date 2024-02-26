<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAgents extends Model
{
    use HasFactory;

    protected $table = 'property_agents';
    protected $primaryKey = 'property_agent_id';

    protected $fillable = [
        'agent_id',
        'property_id',
        'created_by',
        'updated_by',
    ];

    public function agent(){
        return $this->hasOne(Users::class,'user_id','agent_id');
    }

    public function property(){
        return $this->hasOne(Property::class,'property_id','property_id');
    }
}
