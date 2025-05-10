<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Skill;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    // Publicly accessible page for listing all experts
    public function publicIndex()
    {
        $experts = Expert::with('skills')->get();
        return view('experts.index', compact('experts'));
    }

    // Admin: Show all experts (same as public, could be different layout)
    public function index()
    {
        $experts = Expert::with('skills')->get();
        return view('experts.index', compact('experts'));
    }

    // Show form to create new expert
    public function create()
    {
        $skills = Skill::all();
        return view('experts.create', compact('skills'));
    }

    // Store a new expert
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:experts',
            'skills' => 'array',
        ]);

        $expert = Expert::create($request->only('name', 'email'));
        $expert->skills()->sync($request->skills);

        return redirect()->route('experts.index')->with('success', 'Expert created successfully.');
    }

    // Display a single expert
    public function show($id)
    {
        $expert = Expert::with('skills')->findOrFail($id);
        return view('experts.show', compact('expert'));
    }

    // Show form to edit an expert
    public function edit($id)
    {
        $expert = Expert::findOrFail($id);
        $skills = Skill::all();
        return view('experts.edit', compact('expert', 'skills'));
    }

    // Update an expert's data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:experts,email,' . $id,
            'skills' => 'array',
        ]);

        $expert = Expert::findOrFail($id);
        $expert->update($request->only('name', 'email'));
        $expert->skills()->sync($request->skills);

        return redirect()->route('experts.index')->with('success', 'Expert updated successfully.');
    }

    // Delete an expert
    public function destroy($id)
    {
        $expert = Expert::findOrFail($id);
        $expert->skills()->detach();
        $expert->delete();

        return redirect()->route('experts.index')->with('success', 'Expert deleted successfully.');
    }
}
