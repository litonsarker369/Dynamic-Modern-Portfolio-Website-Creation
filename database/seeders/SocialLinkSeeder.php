<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            ['platform' => 'GitHub', 'url' => 'https://github.com', 'icon_class' => 'fab fa-github', 'display_order' => 1],
            ['platform' => 'LinkedIn', 'url' => 'https://linkedin.com', 'icon_class' => 'fab fa-linkedin-in', 'display_order' => 2],
            ['platform' => 'Twitter', 'url' => 'https://twitter.com', 'icon_class' => 'fab fa-twitter', 'display_order' => 3],
            ['platform' => 'Dribbble', 'url' => 'https://dribbble.com', 'icon_class' => 'fab fa-dribbble', 'display_order' => 4],
            ['platform' => 'Email', 'url' => 'mailto:hello@example.com', 'icon_class' => 'fas fa-envelope', 'display_order' => 5],
        ];

        foreach ($links as $link) {
            SocialLink::create($link);
        }
    }
}
