<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use App\Models\Department;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['client', 'department'])->get();
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::all();
        $departments = Department::all();
        return view('admin.project.create', compact('clients', 'departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'status_id' => 'required|exists:statuses,id',
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'images' => 'nullable|string',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $clients = Client::all();
        $departments = Department::all();
        return view('admin.project..edit', compact('project', 'clients', 'departments'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'status_id' => 'required|exists:statuses,id',
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'images' => 'nullable|string',
        ]);

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
