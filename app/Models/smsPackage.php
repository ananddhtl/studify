<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smsPackage extends Model
{
    use HasFactory;
    
    protected $table = 's_m_s_packages';
    protected $fillable = [
        'package_name',
        'package_price',
        'sms_limit',
        'country',
        'message',
        'status',
    ];


}
