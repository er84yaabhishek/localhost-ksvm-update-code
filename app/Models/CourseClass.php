<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    use HasFactory;

    protected $table = 'course_classes';
    protected $fillable = ['label', 'icon', 'color', 'order', 'status'];
    protected $casts = ['status' => 'boolean', 'order' => 'integer'];

    public function subjects()
    {
        return $this->hasMany(CourseSubject::class, 'course_class_id')->where('status', true)->orderBy('order');
    }

    public function allSubjects()
    {
        return $this->hasMany(CourseSubject::class, 'course_class_id')->orderBy('order');
    }

    public function scopeActive($query) { return $query->where('status', true); }
    public function scopeOrdered($query) { return $query->orderBy('order', 'asc'); }
}
