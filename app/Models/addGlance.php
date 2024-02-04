<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addGlance extends Model
{
    use HasFactory;
    protected $table = 'glances';
    protected $fillable = [
        'institution_id',
        'institution_detail_id',
        'glance',
        'status',
        
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
