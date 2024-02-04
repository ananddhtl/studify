<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addDocument extends Model
{
    use HasFactory;
    protected $table = 'documents_manage';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'p_id',
        'filename',
        'level',
        'foldername',
        'status',
        
    ];
}
