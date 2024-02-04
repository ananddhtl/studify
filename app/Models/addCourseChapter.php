<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addCourseChapter extends Model
{
    use HasFactory;
    protected $table = 'addCourseChapter';
    protected $fillable = [
        'course_id',
        'topic_id',
        'chapter_name',
        'image',
        'pdf',
        'chapter_subtitle',
        'chapter_description',
        'status'
        
    ];

}
