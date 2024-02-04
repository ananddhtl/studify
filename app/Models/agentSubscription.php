<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agentSubscription extends Model
{
    use HasFactory;
    
    protected $table = 'agent_subscription';
    protected $fillable = [
        'agent_id',
        'package_id',
        'transcation_id',
        'amount',
        'payment_status',
        'status',
       
    ];


}
