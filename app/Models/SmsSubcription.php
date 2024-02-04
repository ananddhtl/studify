<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsSubcription extends Model
{
    use HasFactory;
    
    protected $table = 'sms_subcription';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'package_id',
        'type',
        'balance_sms',
        'remaining_sms',
        'package_price',
        'transcation_id',
        'status'
    ];


}
