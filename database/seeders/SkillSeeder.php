<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'icon_class' => 'fab fa-laravel', 'category' => 'backend', 'percentage' => 95, 'display_order' => 1],
            ['name' => 'PHP', 'icon_class' => 'fab fa-php', 'category' => 'backend', 'percentage' => 90, 'display_order' => 2],
            ['name' => 'MySQL', 'icon_class' => 'fas fa-database', 'category' => 'backend', 'percentage' => 85, 'display_order' => 3],
            ['name' => 'Node.js', 'icon_class' => 'fab fa-node-js', 'category' => 'backend', 'percentage' => 75, 'display_order' => 4],
            ['name' => 'Vue.js', 'icon_class' => 'fab fa-vuejs', 'category' => 'frontend', 'percentage' => 90, 'display_order' => 5],
            ['name' => 'React', 'icon_class' => 'fab fa-react', 'category' => 'frontend', 'percentage' => 85, 'display_order' => 6],
            ['name' => 'JavaScript', 'icon_class' => 'fab fa-js', 'category' => 'frontend', 'percentage' => 92, 'display_order' => 7],
            ['name' => 'HTML/CSS', 'icon_class' => 'fab fa-html5', 'category' => 'frontend', 'percentage' => 95, 'display_order' => 8],
            ['name' => 'Bootstrap', 'icon_class' => 'fab fa-bootstrap', 'category' => 'frontend', 'percentage' => 88, 'display_order' => 9],
            ['name' => 'Tailwind CSS', 'icon_class' => 'fab fa-tailwind', 'category' => 'frontend', 'percentage' => 82, 'display_order' => 10],
            ['name' => 'Docker', 'icon_class' => 'fab fa-docker', 'category' => 'devops', 'percentage' => 70, 'display_order' => 11],
            ['name' => 'Git', 'icon_class' => 'fab fa-git-alt', 'category' => 'devops', 'percentage' => 90, 'display_order' => 12],
            ['name' => 'AWS', 'icon_class' => 'fab fa-aws', 'category' => 'devops', 'percentage' => 65, 'display_order' => 13],
            ['name' => 'Linux', 'icon_class' => 'fab fa-linux', 'category' => 'devops', 'percentage' => 78, 'display_order' => 14],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
