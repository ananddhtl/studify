<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addCommission extends Model
{
    use HasFactory;
    protected $table = 'commissions';
    protected $fillable = [
        'institution_id',
        'degree',
        'commission_type',
        'commission'
        
    ];

    

}
