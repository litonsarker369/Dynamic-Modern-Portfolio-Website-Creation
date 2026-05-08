<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contacts = ContactInfo::ordered()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'label' => 'nullable|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer|min:0',
        ]);

        ContactInfo::create($validated);

        return redirect()->route('admin.contact.index')
            ->with('success', 'Contact info added successfully.');
    }

    public function update(Request $request, ContactInfo $contactInfo)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'label' => 'nullable|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $contactInfo->update($validated);

        return redirect()->route('admin.contact.index')
            ->with('success', 'Contact info updated successfully.');
    }

    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();

        return redirect()->route('admin.contact.index')
            ->with('success', 'Contact info deleted successfully.');
    }
}
