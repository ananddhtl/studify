<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addInvoice extends Model
{
    use HasFactory;
    protected $table = 'addInvoice';
    protected $fillable = [
        'invoice_id',
        'student_id',
        'insitution_id',
        'course_id',
        'tution_fees',
        'comission_per',
        'comission_amount',
        'gst_per',
        'gst_amount',
        'all_total',
        'status',
    
    ];

   
}
