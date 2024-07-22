<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Project;
use App\Models\Manager;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::with(['project', 'manager'])->get();
        return view('admin.work.index', compact('works'));
    }

    public function create()
    {
        $projects = Project::all();
        $managers = Manager::all();
        return view('admin.work.create', compact('projects', 'managers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'status_id' => 'required|exists:statuses,id',
            'manager_id' => 'required|exists:managers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
            'image' => 'nullable|string|max:255',
            'images' => 'nullable|string',
        ]);

        Work::create($validatedData);

        return redirect()->route('works.index')->with('success', 'Work created successfully.');
    }

    public function show(Work $work)
    {
        return view('admin.work.show', compact('work'));
    }

    public function edit(Work $work)
    {
        $projects = Project::all();
        $managers = Manager::all();
        return view('admin.work.edit', compact('work', 'projects', 'managers'));
    }

    public function update(Request $request, Work $work)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'status_id' => 'required|exists:statuses,id',
            'manager_id' => 'required|exists:managers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
            'image' => 'nullable|string|max:255',
            'images' => 'nullable|string',
        ]);

        $work->update($validatedData);

        return redirect()->route('works.index')->with('success', 'Work updated successfully.');
    }

    public function destroy(Work $work)
    {
        $work->delete();

        return redirect()->route('works.index')->with('success', 'Work deleted successfully.');
    }
}
