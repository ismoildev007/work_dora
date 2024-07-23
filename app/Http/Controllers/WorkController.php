<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Project;
use App\Models\Manager;
use App\Models\Status;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::with('project', 'manager', 'status', 'work_employees.employee')->get();
        return view('admin.work.index', compact('works'));
    }

    public function create()
    {
        $projects = Project::all();
        $managers = Manager::all();
        $statuses = Status::all();
        $employees = Employees::all();
        return view('admin.work.create', compact('projects', 'managers', 'statuses', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'manager_id' => 'required|exists:managers,id',
            'status_id' => 'required|exists:statuses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('work_images');
        }

        if ($request->hasFile('images')) {
            $data['images'] = json_encode(array_map(fn ($file) => $file->store('work_images'), $request->file('images')));
        }

        $work = Work::create($data);

        if ($request->has('employees')) {
            $work->work_employees()->createMany(array_map(fn ($employee_id) => ['employee_id' => $employee_id], $request->input('employees')));
        }

        return redirect()->route('works.index');
    }

    public function edit(Work $work)
    {
        $projects = Project::all();
        $managers = Manager::all();
        $statuses = Status::all();
        $employees = Employees::all();
        $selectedEmployees = $work->work_employees->pluck('employee_id')->toArray();

        return view('admin.work.edit', compact('work', 'projects', 'managers', 'statuses', 'employees', 'selectedEmployees'));
    }

    public function update(Request $request, Work $work)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'manager_id' => 'required|exists:managers,id',
            'status_id' => 'required|exists:statuses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($work->image) {
                Storage::delete($work->image);
            }
            $data['image'] = $request->file('image')->store('work_images');
        }

        if ($request->hasFile('images')) {
            if ($work->images) {
                array_map(fn ($image) => Storage::delete($image), json_decode($work->images, true));
            }
            $data['images'] = json_encode(array_map(fn ($file) => $file->store('work_images'), $request->file('images')));
        }

        $work->update($data);

        $work->work_employees()->delete();
        if ($request->has('employees')) {
            $work->work_employees()->createMany(array_map(fn ($employee_id) => ['employee_id' => $employee_id], $request->input('employees')));
        }

        return redirect()->route('works.index');
    }

    public function destroy(Work $work)
    {
        if ($work->image) {
            Storage::delete($work->image);
        }

        if ($work->images) {
            array_map(fn ($image) => Storage::delete($image), json_decode($work->images, true));
        }

        $work->delete();

        return redirect()->route('works.index');
    }
}
