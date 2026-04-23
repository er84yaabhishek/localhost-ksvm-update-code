<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'slug',
        'title',
        'description',
        'image',
        'user_id',
    ];
    protected $casts = [
        'status' => 'boolean',
        'slug' => 'string',
        'title' => 'string',
        'description' => 'string',
        'image' => 'string',
    ];
}
