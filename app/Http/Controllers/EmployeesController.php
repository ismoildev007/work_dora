<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Department;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employees::with('user', 'status', 'department')->get();
        return view('admin.employee.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $statuses = Status::all();
        $users = User::all();
        return view('admin.employee.create', compact('departments', 'statuses', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'status_id' => 'required|exists:statuses,id',
            'role' => 'required|string|max:255',
        ]);

        Employees::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employees $employee)
    {
        $departments = Department::all();
        $statuses = Status::all();
        $users = User::all();
        return view('admin.employee.edit', compact('employee', 'departments', 'statuses', 'users'));
    }

    public function update(Request $request, Employees $employee)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'status_id' => 'required|exists:statuses,id',
            'role' => 'required|string|max:255',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employees $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
