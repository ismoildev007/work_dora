<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::with('user', 'status')->get();
        return view('admin.manager.index', compact('managers'));
    }

    public function create()
    {
        $statuses = Status::all();
        $users = User::all();
        return view('admin.manager.create', compact('statuses', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'role' => 'required|string|max:255',
        ]);

        Manager::create($request->all());

        return redirect()->route('managers.index')->with('success', 'Manager created successfully.');
    }

    public function edit(Manager $manager)
    {
        $statuses = Status::all();
        $users = User::all();
        return view('admin.manager.edit', compact('manager', 'statuses', 'users'));
    }

    public function update(Request $request, Manager $manager)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'role' => 'required|string|max:255',
        ]);

        $manager->update($request->all());

        return redirect()->route('managers.index')->with('success', 'Manager updated successfully.');
    }

    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('managers.index')->with('success', 'Manager deleted successfully.');
    }
}
