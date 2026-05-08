<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'name' => 'John Developer',
            'headline' => 'Full-Stack Developer & UI/UX Designer',
            'bio' => "I'm a passionate full-stack developer with over 5 years of experience building modern web applications. I specialize in Laravel, Vue.js, and React, creating clean, efficient, and user-friendly digital experiences.\n\nWhen I'm not coding, you'll find me exploring new technologies, contributing to open-source projects, or writing technical articles. I believe in writing clean, maintainable code and creating interfaces that users love.\n\nLet's build something amazing together!",
            'profile_image' => null,
            'resume_url' => null,
        ]);
    }
}
