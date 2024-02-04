<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    
    protected $table = 'admins';
    protected $fillable = [
        'email',
        'admin_name',
        'admin_phone',
        'admin_image',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
