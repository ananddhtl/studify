<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStudentMarksheet extends Model
{
    use HasFactory;
    protected $table = 'student_marksheet_images';
    protected $fillable = [
        'student_id',
        'marksheet',
       
       
    ];

}
