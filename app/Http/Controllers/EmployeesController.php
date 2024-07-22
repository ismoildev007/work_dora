<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employees;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employees::all();
        return view('admin.employee.index', compact('employees'));
    }

    public function create()
    {
        $users = User::all();
        $departments = Department::all();
        $statuses = Status::all();
        return view('admin.employee.create', compact('users','departments', 'statuses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'department_id' => 'nullable|exists:departments,id',
            'role' => 'required|string|max:255',
        ]);

        Employees::create($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employees $employee)
    {
        return view('admin.employee.show', compact('employee'));
    }

    public function edit(Employees $employee)
    {
        $statuses = Status::all();
        return view('admin.employee.edit', compact('employee', 'statuses'));
    }

    public function update(Request $request, Employees $employee)
    {
        $validatedData = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'department_id' => 'nullable|exists:departments,id',
            'role' => 'required|string|max:255',
        ]);

        $employee->update($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employees $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
