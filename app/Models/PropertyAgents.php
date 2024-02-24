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
        'property_agent_id',
        'agent_id',
        'property_id',
        'created_by',
        'updated_by',
    ];
}
