<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStoragePackage extends Model
{
    use HasFactory;
    protected $table = 'storage_packages';
    protected $fillable = [
        'package_name',
        'package_price',
        'storage_limit',
        'country',
        'message',
        'status'
    ];
}
