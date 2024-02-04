<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentCourse extends Model
{
    use HasFactory;
    
    protected $table = 'student_course_subscriptions';
    protected $fillable = [
        'course_id',
        'member_id',
        'transcation_id',
        'amount',
        'payment_status',
        'status',
       
    ];


}
