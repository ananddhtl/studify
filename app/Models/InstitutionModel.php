<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionModel extends Model
{
    use HasFactory;

     protected $table = 'institutions';
    protected $fillable = [
        'institution_name',
        'first_name',
        'last_name',
        'phone',
        'email',
        'email_verify',
        'country',
        'token',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
