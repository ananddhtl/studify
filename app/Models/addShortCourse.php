<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addShortCourse extends Model
{
    use HasFactory;
    protected $table = 'short_courses';
    protected $fillable = [
        'course_name',
        'image',
        'course_subtitle',
        'course_description',
        'course_prize',
        'discount_prize',
        'status',
        
    ];

}
