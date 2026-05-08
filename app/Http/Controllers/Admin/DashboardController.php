<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $publishedProjects = Project::published()->count();
        $skillCount = Skill::count();
        $unreadMessages = Message::unread()->count();
        $totalMessages = Message::count();
        $recentMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'projectCount', 'publishedProjects', 'skillCount',
            'unreadMessages', 'totalMessages', 'recentMessages'
        ));
    }
}
