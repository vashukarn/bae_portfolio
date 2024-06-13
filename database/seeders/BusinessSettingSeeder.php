<?php

namespace Database\Seeders;

use App\Models\SuperAdmin\BusinessSetting;
use Illuminate\Database\Seeder;

class BusinessSettingSeeder extends Seeder
{
    public function run(): void
    {
        $business_settings = [
            [
                'key' => 'app_name',
                'data_type' => 'text',
                'dev_value' => 'Ankita Kesari',
                'prod_value' => 'Ankita Kesari',
            ],
            [
                'key' => 'meta_site_author',
                'data_type' => 'text',
                'dev_value' => 'Vashu Karn',
                'prod_value' => 'Vashu Karn',
            ],
            [
                'key' => 'meta_keywords',
                'data_type' => 'text',
                'dev_value' => 'Ankita Kesari',
                'prod_value' => 'Ankita Kesari',
            ],
            [
                'key' => 'meta_title',
                'data_type' => 'text',
                'dev_value' => 'Ankita Kesari',
                'prod_value' => 'Ankita Kesari',
            ],
            [
                'key' => 'meta_description',
                'data_type' => 'text',
                'dev_value' => 'Ankita Kesari',
                'prod_value' => 'Ankita Kesari',
            ],
            [
                'key' => 'contact_email',
                'data_type' => 'text',
                'dev_value' => 'test@gmail.com',
                'prod_value' => 'test@gmail.com',
            ],
            [
                'key' => 'contact_number',
                'data_type' => 'text',
                'dev_value' => '+9779815713732',
                'prod_value' => '+9779815713732',
            ],
            [
                'key' => 'contact_address',
                'data_type' => 'text',
                'dev_value' => 'An Address',
                'prod_value' => 'An Address',
            ],
            [
                'key' => 'slogan',
                'data_type' => 'text',
                'dev_value' => 'Your Source for Quality Education!',
                'prod_value' => 'Your Source for Quality Education!',
            ],
            [
                'key' => 'favicon',
                'data_type' => 'text',
                'dev_value' => config('app.url') . '/favicon.jpg',
                'prod_value' => config('app.url') . '/favicon.jpg',
            ],
            [
                'key' => 'logo',
                'data_type' => 'text',
                'dev_value' => config('app.url') . '/logo.png',
                'prod_value' => config('app.url') . '/logo.png',
            ],
            [
                'key' => 'logo_light',
                'data_type' => 'text',
                'dev_value' => config('app.url') . '/logo_white.png',
                'prod_value' => config('app.url') . '/logo_white.png',
            ],
            [
                'key' => 'carousel_blogs',
                'data_type' => 'text',
                'dev_value' => '',
                'prod_value' => '',
            ],
            [
                'key' => 'top_blogs',
                'data_type' => 'text',
                'dev_value' => '',
                'prod_value' => '',
            ],
            [
                'key' => 'featured_blogs',
                'data_type' => 'text',
                'dev_value' => '',
                'prod_value' => '',
            ],
            [
                'key' => 'popular_blogs',
                'data_type' => 'text',
                'dev_value' => '',
                'prod_value' => '',
            ],
            [
                'key' => 'trending_blogs',
                'data_type' => 'text',
                'dev_value' => '',
                'prod_value' => '',
            ],
            [
                'key' => 'trending_categories',
                'data_type' => 'text',
                'dev_value' => '',
                'prod_value' => '',
            ],
            [
                'key' => 'recommended_blogs',
                'data_type' => 'text',
                'dev_value' => '',
                'prod_value' => '',
            ],
        ];
        BusinessSetting::insert($business_settings);
    }
}
