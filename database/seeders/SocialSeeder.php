<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    public function run(): void
    {
        $socials = [
            [
                'title' => 'rss',
                'font_awesome_icon' => 'fa fa-rss',
            ],
            [
                'title' => 'facebook',
                'font_awesome_icon' => 'fa fa-facebook',
            ],
            [
                'title' => 'twitter',
                'font_awesome_icon' => 'fa fa-twitter',
            ],
            [
                'title' => 'pinterest',
                'font_awesome_icon' => 'fa fa-pinterest',
            ],
            [
                'title' => 'instagram',
                'font_awesome_icon' => 'fa fa-instagram',
            ],
            [
                'title' => 'youtube',
                'font_awesome_icon' => 'fa fa-youtube',
            ],
            [
                'title' => 'linkedin',
                'font_awesome_icon' => 'fa fa-linkedin',
            ],
        ];
        Social::insert($socials);
    }
}
