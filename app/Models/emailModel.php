<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailModel extends Model
{
    use HasFactory;
    
    protected $table = 'emails';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'sender',
        'reciever',
        'subject',
        'message',
        'type',
        'member_type',
        'emailcount'
    ];


}
