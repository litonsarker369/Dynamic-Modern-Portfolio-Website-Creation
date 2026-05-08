<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'headline' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'resume_url' => 'nullable|url|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $about = About::first();

        if (!$about) {
            $about = new About();
        }

        if ($request->hasFile('profile_image')) {
            if ($about->profile_image) {
                Storage::disk('public')->delete($about->profile_image);
            }
            $validated['profile_image'] = $request->file('profile_image')
                ->store('about', 'public');
        }

        $about->fill($validated);
        $about->save();

        return redirect()->route('admin.about.edit')
            ->with('success', 'About section updated successfully.');
    }
}
