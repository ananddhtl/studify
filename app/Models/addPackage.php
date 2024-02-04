<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addPackage extends Model
{
    use HasFactory;
    protected $table = 'packages';
    protected $fillable = [
        'package_id',
        'package_name',
        'package_title',
        'package_subtitle',
        'package_monthly',
        'package_yearly',
        'package_feature',
        'type'
        
    ];

}
