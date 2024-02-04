<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStudentAcademic extends Model
{
    use HasFactory;
    protected $table = 'student_academic_info';
    protected $fillable = [
        'student_id',
        'school_name',
        'street_name',
        'country',
        'province_state',
        'zipcode',
        'city',
        'passed_year',
        'level_of_study',
        'status',
        
    ];

    

}
