<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Skill;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function publicIndex()
    {
        $experts = Expert::with('skills')->get();
        return view('experts.index', compact('experts'));
    }



public function index()
{
    $experts = Expert::with('skills')->get();
    return view('experts.index', compact('experts'));
}


    public function create()
    {
        $skills = Skill::all();
        return view('admin.experts.create', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'photo' => 'nullable|image',
            'certificate' => 'nullable|file|mimes:pdf',
            'skills' => 'array|required',
        ]);

        $expert = new Expert($request->only(['name', 'location', 'email']));

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $expert->photo = $path;
        }

        if ($request->hasFile('certificate')) {
            $path = $request->file('certificate')->store('certificates', 'public');
            $expert->certificate = $path;
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
            'name' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'skills' => 'array|required',
        ]);

        $expert->update($request->only(['name', 'location', 'email']));

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $expert->photo = $path;
        }

        if ($request->hasFile('certificate')) {
            $path = $request->file('certificate')->store('certificates', 'public');
            $expert->certificate = $path;
        }

        $expert->skills()->sync($request->skills);

        return redirect()->route('experts.index')->with('success', 'Expert updated.');
    }

    public function destroy($id)
    {
        $expert = Expert::findOrFail($id);
        $expert->delete();

        return redirect()->route('experts.index')->with('success', 'Expert deleted.');
    }
}


