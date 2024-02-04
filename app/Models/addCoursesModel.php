<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addCoursesModel extends Model
{
    use HasFactory;
    protected $table = 'institution_courses';
    protected $fillable = [
        'institution_id',
        'institution_detail_id',
        'intake',
        'branch_id',
        'type',
        'c_name',
        'AOS',
        'status',
        'duration'
       
    ];

}
