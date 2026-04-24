<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = 'site_settings';
    protected $fillable = ['key', 'value'];

    /**
     * Get a setting value by key with optional default
     */
    public static function get(string $key, string $default = ''): string
    {
        $setting = static::where('key', $key)->first();
        return $setting ? ($setting->value ?? $default) : $default;
    }

    /**
     * Set a setting value (insert or update)
     */
    public static function set(string $key, ?string $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value ?? '']);
    }

    /**
     * Get all settings as key => value array
     */
    public static function getAllSettings(): array
    {
        return static::all()->pluck('value', 'key')->toArray();
    }

    /**
     * Default settings — used when DB is empty
     */
    public static function defaults(): array
    {
        return [
            // Header
            'site_name'          => 'K.S.V.M. Education Centre',
            'site_tagline'       => 'Quality Education for Every Child',
            'header_phone'       => '+91-7084183114, 0512-3531047',
            'header_email'       => 'ksvmeducationcenter@gmail.com',
            'logo'               => 'front/img/ksvm.jpeg',

            // Footer
            'footer_description' => 'We at K.S.V.M. provide a happy, caring and safe environment for your child with a priority given to develop high standards of education.',
            'footer_address'     => 'Sector E-Krishna Vihar, Panki Road, Kalyanpur, Kanpur-208017',
            'footer_phone'       => '+91-7084183114, 0512-3531047',
            'footer_email'       => 'ksvmeducationcenter@gmail.com',
            'footer_copyright'   => 'KSVM Education Center. All rights reserved.',

            // Social Media
            'social_facebook'    => '',
            'social_instagram'   => '',
            'social_youtube'     => '',
            'social_twitter'     => '',
            'social_whatsapp'    => '',
        ];
    }
}
