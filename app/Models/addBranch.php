<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addBranch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = [
        'institution_id',
        'institution_detail_id',
        'branch_name',
        'location',
        'status'
        
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
