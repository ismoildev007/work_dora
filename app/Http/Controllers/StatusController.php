<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('admin.status.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.status.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // For hex color code
        ]);

        Status::create($validatedData);

        return redirect()->route('statuses.index')->with('success', 'Status created successfully.');
    }

    public function show(Status $status)
    {
        return view('admin.status.show', compact('status'));
    }

    public function edit(Status $status)
    {
        return view('admin.status.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // For hex color code
        ]);

        $status->update($validatedData);

        return redirect()->route('statuses.index')->with('success', 'Status updated successfully.');
    }

    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('statuses.index')->with('success', 'Status deleted successfully.');
    }
}
