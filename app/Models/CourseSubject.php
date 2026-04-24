<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    use HasFactory;

    protected $table = 'course_subjects';
    protected $fillable = ['course_class_id', 'subject_name', 'order', 'status'];
    protected $casts = ['status' => 'boolean', 'order' => 'integer'];

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class, 'course_class_id');
    }
}
