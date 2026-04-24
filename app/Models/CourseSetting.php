<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSetting extends Model
{
    use HasFactory;

    protected $table = 'course_settings';
    protected $fillable = ['key', 'value'];

    public static function get(string $key, string $default = ''): string
    {
        $s = static::where('key', $key)->first();
        return $s ? ($s->value ?? $default) : $default;
    }

    public static function set(string $key, ?string $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value ?? '']);
    }

    public static function getAllSettings(): array
    {
        return static::all()->pluck('value', 'key')->toArray();
    }

    public static function defaults(): array
    {
        return [
            'page_heading'    => 'Our Curriculum',
            'page_subtitle'   => 'Well structured curriculum based on New Education Policy 2020',
            'discipline_heading' => 'Code of Discipline',
        ];
    }
}
