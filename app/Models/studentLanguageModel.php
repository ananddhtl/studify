<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentLanguageModel extends Model
{
    use HasFactory;

    protected $table = 'student_language_score';
    
    protected $fillable = [
        'student_id',
        'exam_type',
        'speaking_score',
        'reading_score',
        'writing_score',
        'listening_score',
        'average_score',
        'exam_date',
        'status',
    ];

}
