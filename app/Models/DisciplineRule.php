<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplineRule extends Model
{
    use HasFactory;

    protected $table = 'discipline_rules';
    protected $fillable = ['rule', 'order', 'status'];
    protected $casts = ['status' => 'boolean', 'order' => 'integer'];

    public function scopeActive($query) { return $query->where('status', true); }
    public function scopeOrdered($query) { return $query->orderBy('order', 'asc'); }
}
