<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStudentRecommand extends Model
{
    use HasFactory;
    protected $table = 'student_recommandation_images';
    protected $fillable = [
        'student_id',
        'recommand',
       
       
    ];

}
