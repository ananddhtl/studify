<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addCoupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'coupon_discount_type',
        'coupon_amount',
        'coupon_duration',
        'coupon_type',
        'start_date',
        'end_date',
        'status',
        
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
