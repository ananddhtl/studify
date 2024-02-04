<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addEmailTemplate extends Model
{
    use HasFactory;
    protected $table = 'email_templates';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'add_type',
        'name',
        'description',
        'type',
        'status'
    ];
}
