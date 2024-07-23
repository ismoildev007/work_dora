<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Status;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index', compact('departments'));
    }

    public function create()
    {
        $statuses = Status::all();
        return view('admin.department.create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
            'phone_number' => 'nullable|string|max:20',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        $statuses = Status::all();
        return view('admin.department.edit', compact('department', 'statuses'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
