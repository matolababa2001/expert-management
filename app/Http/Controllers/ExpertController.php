<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Skill;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    // Public view for all users
    public function publicIndex()
    {
        $experts = Expert::with('skills')->get();
        return view('experts.public', compact('experts'));
    }
    
    // Admin-only listing
    public function index()
    {
        $experts = Expert::with('skills')->get();
        return view('admin.experts.index', compact('experts'));
    }

    public function create()
    {
        $skills = Skill::all();
        return view('admin.experts.create', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'location' => 'required|string',
            'photo' => 'nullable|image|max:2048',
            'certificate' => 'nullable|mimes:pdf|max:4096',
            'skills' => 'array',
        ]);

        $expert = new Expert($request->except('skills', 'photo', 'certificate'));

        if ($request->hasFile('photo')) {
            $expert->photo = $request->file('photo')->store('photos', 'public');
        }

        if ($request->hasFile('certificate')) {
            $expert->certificate = $request->file('certificate')->store('certificates', 'public');
        }

        $expert->save();
        $expert->skills()->sync($request->skills);

        return redirect()->route('experts.index')->with('success', 'Expert created successfully.');
    }

    public function edit($id)
    {
        $expert = Expert::findOrFail($id);
        $skills = Skill::all();
        return view('admin.experts.edit', compact('expert', 'skills'));
    }

    public function update(Request $request, $id)
    {
        $expert = Expert::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'location' => 'required|string',
            'photo' => 'nullable|image|max:2048',
            'certificate' => 'nullable|mimes:pdf|max:4096',
            'skills' => 'array',
        ]);

        $expert->fill($request->except('skills', 'photo', 'certificate'));

        if ($request->hasFile('photo')) {
            $expert->photo = $request->file('photo')->store('photos', 'public');
        }

        if ($request->hasFile('certificate')) {
            $expert->certificate = $request->file('certificate')->store('certificates', 'public');
        }

        $expert->save();
        $expert->skills()->sync($request->skills);

        return redirect()->route('experts.index')->with('success', 'Expert updated successfully.');
    }

    public function destroy($id)
    {
        $expert = Expert::findOrFail($id);
        $expert->skills()->detach();
        $expert->delete();

        return redirect()->route('experts.index')->with('success', 'Expert deleted successfully.');
    }
}
