<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class universityCoursePayment extends Model
{
    use HasFactory;
    protected $table = 'university_course_payments';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'course_id',
        'student_id',
        'payment_status',
        'transcation_id',
        'image',
        'mode',
        'fees_type',
        'fees_amount',
        'invoice_status'
        
    ];

  
}
