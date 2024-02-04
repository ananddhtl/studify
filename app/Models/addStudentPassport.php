<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStudentPassport extends Model
{
    use HasFactory;
    protected $table = 'student_passport_images';
    protected $fillable = [
        'student_id',
        'image',
       
       
    ];

}
