<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SampleProjectSeeder::class,
            SkillSeeder::class,
            SocialLinkSeeder::class,
            ContactInfoSeeder::class,
            AboutSeeder::class,
        ]);
    }
}
