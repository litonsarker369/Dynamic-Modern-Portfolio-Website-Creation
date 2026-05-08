<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class SampleProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'description' => 'A full-featured e-commerce platform built with Laravel and Vue.js. Features include product management, shopping cart, payment processing with Stripe, order tracking, and an admin dashboard for inventory management. The platform supports multiple vendors and includes a recommendation engine.',
                'category' => 'Web App',
                'image_path' => null,
                'project_url' => 'https://example.com/ecommerce',
                'date' => '2025-12-15',
                'featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Social Media Dashboard',
                'slug' => 'social-media-dashboard',
                'description' => 'A comprehensive social media analytics dashboard that aggregates data from multiple platforms including Twitter, Instagram, and LinkedIn. Features real-time data visualization, scheduled reporting, competitor analysis, and AI-powered content suggestions.',
                'category' => 'Dashboard',
                'image_path' => null,
                'project_url' => 'https://example.com/dashboard',
                'date' => '2025-10-20',
                'featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Task Management App',
                'slug' => 'task-management-app',
                'description' => 'A collaborative task management application with real-time updates using WebSockets. Features include Kanban boards, Gantt charts, time tracking, team collaboration, file attachments, and integration with Slack and GitHub.',
                'category' => 'Web App',
                'image_path' => null,
                'project_url' => 'https://example.com/tasks',
                'date' => '2025-08-05',
                'featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Weather Forecast App',
                'slug' => 'weather-forecast-app',
                'description' => 'A beautiful weather application with 7-day forecasts, interactive maps, and severe weather alerts. Built with React Native for cross-platform mobile support. Uses OpenWeatherMap API and includes animated weather visualizations.',
                'category' => 'Mobile',
                'image_path' => null,
                'project_url' => 'https://example.com/weather',
                'date' => '2025-06-10',
                'featured' => false,
                'is_published' => true,
            ],
            [
                'title' => 'Portfolio Generator',
                'slug' => 'portfolio-generator',
                'description' => 'A dynamic portfolio website generator that allows creatives to build stunning portfolios without coding. Features drag-and-drop sections, customizable themes, image optimization, SEO tools, and one-click deployment to Netlify or Vercel.',
                'category' => 'Web App',
                'image_path' => null,
                'project_url' => 'https://example.com/portfolio-gen',
                'date' => '2025-04-22',
                'featured' => false,
                'is_published' => true,
            ],
            [
                'title' => 'Fitness Tracking API',
                'slug' => 'fitness-tracking-api',
                'description' => 'A RESTful API for fitness tracking applications built with Laravel. Handles user authentication, workout logging, progress tracking, nutrition planning, and social features. Includes comprehensive API documentation with Swagger/OpenAPI.',
                'category' => 'API',
                'image_path' => null,
                'project_url' => 'https://example.com/fitness-api',
                'date' => '2025-02-14',
                'featured' => false,
                'is_published' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
