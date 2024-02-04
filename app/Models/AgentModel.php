<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentModel extends Model
{
    use HasFactory;
    protected $table = 'agents';
    protected $fillable = [
        'package_id',
        'package_duration',
        'package_start_date',
        'package_end_date',
        'company_name',
        'first_name',
        'last_name',
        'email',
        'country',
        'state',
        'token',
        'city',
        'agent_address',
        'established',
        'contact_person',
        'contact_email',
        'contact_phone',
        'bank_name',
        'bank_account',
        'account_name',
        'bank_address',
        'routing',
        'swift_code',
        'agent_image',
        'status',
        'email_verify',
        'payment_status',
        'package_status',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
