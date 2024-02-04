<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addFees extends Model
{
    use HasFactory;
    protected $table = 'course_fees';
    protected $fillable = [
        'institution_id',
        'institution_detail_id',
        'course_id',
        'type',
        'tution_fees',
        'acc_other_fees',
        'application_fees',
        'status',
        
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
