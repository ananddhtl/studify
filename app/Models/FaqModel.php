<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqModel extends Model
{
    use HasFactory;
    
    protected $table = 'f_a_q_s';
    protected $fillable = [
        'question',
        'answer',
        'type'
    ];


}
