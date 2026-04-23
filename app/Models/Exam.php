<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
      use HasFactory;
      protected $fillable = [
        'exam_for',
        'title',
        'priority',
        'description',
        'status',
        'slug',
    ];
}
