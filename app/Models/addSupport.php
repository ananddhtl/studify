<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addSupport extends Model
{
    use HasFactory;
    protected $table = 'supports';
    protected $fillable = [
       'type',
       'assign_to',
       'agent_id',
       'insitution_id',
       'subject',
       'comment'
    ];

   

}
