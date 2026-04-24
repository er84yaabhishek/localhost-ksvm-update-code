<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsSetting extends Model
{
    use HasFactory;

    protected $table = 'about_us_settings';
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
            // Main section
            'tag'           => 'Est. 2009',
            'heading'       => 'About K.S.V.M. Education Centre',
            'para1'         => 'K.S.V.M is a Private English Medium Co-educational institute, established and managed by "Late Pt. Parmeshwar Deen Educational Society." It was started in 2009 with the name "Kailas Public School" from classes playgroup to 5th.',
            'para2'         => 'In the period of 10 years, the planted tree K.P.S. spread its branches and in 2019, the management committee received affiliation from U.P. Board Prayagraj for senior secondary classes and started K.S.V.M. Education Centre (6th to 12th standard) with science stream.',
            'para3'         => 'Now the school has a three-storeyed building, with magnificent infrastructure and the best teachers to enhance the abilities of the students.',
            'image'         => 'front/img/ksvmabout.webp',
            'image_badge'   => 'Quality Education',

            // Stats
            'stat1_num'     => '15+',
            'stat1_label'   => 'Years of Excellence',
            'stat2_num'     => '1000+',
            'stat2_label'   => 'Students Enrolled',
            'stat3_num'     => '50+',
            'stat3_label'   => 'Expert Teachers',

            // Core Values section heading
            'values_heading'  => 'Our Core Values',
            'values_subtitle' => 'Laying the foundation of Excellence',

            // CTA section
            'cta_heading'  => 'Ready to Join KSVM Family?',
            'cta_text'     => 'Admissions are open. Give your child the best start in life.',
            'cta_btn_text' => 'Apply for Admission',
            'cta_btn_url'  => '/admissions',
        ];
    }
}
