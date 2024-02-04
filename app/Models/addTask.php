<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addTask extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'agent_id',
        'insitution_id',
       'task_name',
       'task_description',
       'type',
       'priority',
       'start_date',
       'end_date',
       'assign_id',
       'cancelMessage',
       'status'
    ];

   

}
