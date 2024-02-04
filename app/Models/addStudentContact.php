<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStudentContact extends Model
{
    use HasFactory;
    protected $table = 'student_contact';
    protected $fillable = [
        'student_id',
        'contact_name',
        'relationship',
        'phone_number',
        'email',
    ];

}
