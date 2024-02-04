<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addSmsGroupMember extends Model
{
    use HasFactory;
    protected $table = 'addSmsGroupMember';
    protected $fillable = [
        'group_id',
        'member_id',
        'type',
        'status',
        
    ];

   
}
