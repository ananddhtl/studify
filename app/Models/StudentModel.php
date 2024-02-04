<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'agent_id',
        'insitution_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'gender',
        'dob',
        'birth_place',
        'country',
        'student_img',
        'signature_status',
        'student_status',
        'status',
        'email_verify',
        'payment_status',
        'token',
        'gpa_scale',
        'gpa_score',
        'english_certificate',
        'resume',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
