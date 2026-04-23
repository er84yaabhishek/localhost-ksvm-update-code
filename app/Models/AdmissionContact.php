<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdmissionContact extends Model
{
   use HasFactory;
   protected $fillable =
   [
       'student_name',
       'parent_name',
       'phone',
       'message',
       'subject',
       'class'
   ];

}
