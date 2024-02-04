<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class email_package extends Model
{
    use HasFactory;
    
    protected $table = 'email_packages';
    protected $fillable = [
        'package_name',
        'package_price',
        'email_limit',
        'message',
        'country',
        'status',
    ];


}
