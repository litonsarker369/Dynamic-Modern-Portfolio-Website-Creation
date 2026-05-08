<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink::ordered()->get();
        return view('admin.social-links.index', compact('links'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon_class' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer|min:0',
        ]);

        SocialLink::create($validated);

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link added successfully.');
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon_class' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $socialLink->update($validated);

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link updated successfully.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link deleted successfully.');
    }
}
