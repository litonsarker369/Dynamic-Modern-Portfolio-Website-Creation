<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ContactInfo;
use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $about = About::first();
        $skills = Skill::ordered()->get();
        $projects = Project::published()->latest()->get();
        $socialLinks = SocialLink::ordered()->get();
        $contactInfo = ContactInfo::ordered()->get();

        $categories = $projects->pluck('category')->unique();

        return view('home', compact(
            'about', 'skills', 'projects', 'socialLinks', 'contactInfo', 'categories'
        ));
    }

    public function showProject($slug)
    {
        $project = Project::where('slug', $slug)->published()->firstOrFail();
        $otherProjects = Project::where('id', '!=', $project->id)
            ->published()
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('project-detail', compact('project', 'otherProjects'));
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($validated);

        return back()->with('success', 'Message sent successfully! I\'ll get back to you soon.');
    }
}
