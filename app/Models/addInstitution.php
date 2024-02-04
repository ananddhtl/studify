<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addInstitution extends Model
{
    use HasFactory;
    protected $table = 'institution_detail';
    protected $fillable = [
        'institution_id',
        'country',
        'universirty_name',
        'univ_img',
        'thumbnail',
        'location',
        'country',
        'univ_type',
        'founded',
        'international_student',
        'type',
        'about_heading',
        'about_paragraph',
        'status',
        'video',
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
