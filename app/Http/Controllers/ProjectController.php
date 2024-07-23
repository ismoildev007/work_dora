<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use App\Models\Department;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client', 'department', 'status')->get();
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::all();
        $departments = Department::all();
        $statuses = Status::all();
        return view('admin.project.create', compact('clients', 'departments', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'department_id' => 'required|exists:departments,id',
            'status_id' => 'required|exists:statuses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('client_id', 'department_id', 'status_id', 'title', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('project_images', 'public');
        }

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('project_images', 'public');
            }
            $data['images'] = json_encode($images);
        }

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $clients = Client::all();
        $departments = Department::all();
        $statuses = Status::all();
        return view('admin.project.edit', compact('project', 'clients', 'departments', 'statuses'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'department_id' => 'required|exists:departments,id',
            'status_id' => 'required|exists:statuses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('client_id', 'department_id', 'status_id', 'title', 'description');

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('project_images', 'public');
        }

        if ($request->hasFile('images')) {
            if ($project->images) {
                $existingImages = json_decode($project->images, true);
                foreach ($existingImages as $existingImage) {
                    Storage::disk('public')->delete($existingImage);
                }
            }
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('project_images', 'public');
            }
            $data['images'] = json_encode($images);
        }

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        if ($project->images) {
            $images = json_decode($project->images, true);
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
