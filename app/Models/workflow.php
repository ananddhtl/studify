<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workflow extends Model
{
    use HasFactory;
    protected $table = 'work_flows';
    protected $fillable = [
        'stage_name',
        'status',
        
    ];

    

}
