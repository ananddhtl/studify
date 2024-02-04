<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addRole extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'phone',
        'country',
        'role',
        'type',
        'rolefeatures',
        'role_type',
        'password',
        'agent_id',
        'insitutionid',
        
    ];

    protected $hidden = [
        'password',
        
    ];

}
