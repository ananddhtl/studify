<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageSubcription extends Model
{
    use HasFactory;
    
    protected $table = 'storage_subcription';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'type',
        'balance_storage',
        'remaining_storage',
        'package_price',
        'transcation_id',
        'status'
    ];


}
