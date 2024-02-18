<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addAgentLogin extends Model
{
    use HasFactory;
    protected $table = 'agent_login_histories';
    protected $fillable = [
        'agent_id'
    ];

    

}
