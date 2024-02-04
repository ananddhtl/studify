<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_multiple_image extends Model
{
    use HasFactory;
    protected $table = 'institution_images';
    protected $fillable = [
        'institution_id',
        'institution_detail_id',
        'image',
       
       
    ];

}
