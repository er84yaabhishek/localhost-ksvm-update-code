<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavMenuItem extends Model
{
    use HasFactory;

    protected $table = 'nav_menu_items';

    protected $fillable = ['label', 'url', 'route', 'target', 'order', 'status'];

    protected $casts = ['status' => 'boolean', 'order' => 'integer'];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
