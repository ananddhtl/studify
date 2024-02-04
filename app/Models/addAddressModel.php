<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addAddressModel extends Model
{
    use HasFactory;

    protected $table = 'student_address';
    
    protected $fillable = [
        'student_id',
        'country',
        'street_name',
        'city',
        'state',
        'zipcode',
        'status',
    ];

}
