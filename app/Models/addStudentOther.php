<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStudentOther extends Model
{
    use HasFactory;
    protected $table = 'student_other_images';
    protected $fillable = [
        'student_id',
        'other_image',
       
       
    ];

}
