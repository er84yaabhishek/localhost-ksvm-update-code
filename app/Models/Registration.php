<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch',
        'class',
        'dob',
        'applicant_name',
        'father_name',
        'mother_name',
        'mobile',
        'phone',
        'email',
        'address',
        'last_school',
        'last_class',
        'report_card',
        'applicant_photo',
    ];

    protected $casts = [
        'dob' => 'date',
    ];
}
