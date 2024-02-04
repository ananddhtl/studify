<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSubcription extends Model
{
    use HasFactory;
    
    protected $table = 'email_subcription';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'package_id',
        'type',
        'balance_email',
        'remaining_email',
        'package_price',
        'transcation_id',
        'status'
    ];


}
