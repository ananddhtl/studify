<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addLead extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'location',
        'source',
        'lead_ownwer',
        'type',
        'lead_assign_id',
        'staff_assign_id',
        'comment',
        'status'
        
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
