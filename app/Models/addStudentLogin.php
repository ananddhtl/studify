<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStudentLogin extends Model
{
    use HasFactory;
    protected $table = 'student_login_history';
    protected $fillable = [
        'student_id',
        
    ];

   

}
