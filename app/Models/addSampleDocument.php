<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addSampleDocument extends Model
{
    use HasFactory;
    protected $table = 'sample_document';
    protected $fillable = [
        'category',
        'sub_category',
        'title',
        'description',
        'type',
        'document',
        'status',
        
    ];

}
