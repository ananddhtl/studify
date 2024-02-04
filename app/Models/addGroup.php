<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addGroup extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'group_name',
        'group_description',
        'type',
        'status',
        
    ];

   
}
