<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smsModel extends Model
{
    use HasFactory;
    
    protected $table = 's_m_s';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'sender',
        'reciever',
        'message',
        'type',
        'member_type',
        'smscount'
    ];


}
