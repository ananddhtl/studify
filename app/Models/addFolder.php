<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addFolder extends Model
{
    use HasFactory;
    protected $table = 'folder_table';
    protected $fillable = [
        'folder_id',
        'agent_id',
        'insitution_id',
        'folder_name',
        'owner',
        'status',
    
    ];

   
}
