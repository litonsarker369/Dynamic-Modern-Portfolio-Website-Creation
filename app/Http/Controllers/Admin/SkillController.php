<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::ordered()->get();
        $categories = Skill::select('category')->distinct()->pluck('category');
        return view('admin.skills.index', compact('skills', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'percentage' => 'nullable|integer|min:0|max:100',
            'display_order' => 'nullable|integer|min:0',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill added successfully.');
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'percentage' => 'nullable|integer|min:0|max:100',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}
