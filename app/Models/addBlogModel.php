<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addBlogModel extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'blog_heading',
        'blog_image',
        'blog_description',
        'status'
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
