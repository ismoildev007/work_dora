<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Status;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        return view('admin.manager.index', compact('managers'));
    }

    public function create()
    {
        return view('admin.manager.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
        ]);

        Manager::create($validatedData);

        return redirect()->route('managers.index')->with('success', 'Manager created successfully.');
    }

    public function show(Manager $manager)
    {
        return view('admin.manager.show', compact('manager'));
    }

    public function edit(Manager $manager)
    {
        $statuses = Status::all();
        return view('admin.manager.edit', compact('manager', 'statuses'));
    }

    public function update(Request $request, Manager $manager)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
        ]);

        $manager->update($validatedData);

        return redirect()->route('managers.index')->with('success', 'Manager updated successfully.');
    }

    public function destroy(Manager $manager)
    {
        $manager->delete();

        return redirect()->route('managers.index')->with('success', 'Manager deleted successfully.');
    }
}
