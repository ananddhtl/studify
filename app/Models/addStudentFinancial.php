<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStudentFinancial extends Model
{
    use HasFactory;
    protected $table = 'student_financial_images';
    protected $fillable = [
        'student_id',
        'financial_images',
       
       
    ];

}
