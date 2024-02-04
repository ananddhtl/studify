<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentWorkflow extends Model
{
    use HasFactory;
    
    protected $table = 'student_workflow';
    protected $fillable = [
        'student_id',
        'workflow_id',
        'status'
    ];


}
