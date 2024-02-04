<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addRequirements extends Model
{
    use HasFactory;
    protected $table = 'course_requirement';
    protected $fillable = [
        'institution_id',
        'institution_detail_id',
        'course_id',
        'type',
        'min_gpa',
        'education',
        'TOEFL',
        'IELTS',
        'Pearson',
        'Duolingo',
        'status'
        
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
