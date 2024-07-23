<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Http\Request;

class AmountController extends Controller
{
    public function index()
    {
        $amounts = Amount::all();
        return view('admin.amount.index', compact('amounts'));
    }

    public function create()
    {
        $projects = Project::all();
        $statuses = Status::all();
        return view('admin.amount.create', compact('projects', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'status_id' => 'required|exists:statuses,id',
            'profit' => 'required|numeric',
            'outlay' => 'required|numeric',
        ]);

        Amount::create($request->all());

        return redirect()->route('amounts.index')->with('success', 'Amount created successfully.');
    }

    public function edit(Amount $amount)
    {
        $projects = Project::all();
        $statuses = Status::all();
        return view('admin.amount.edit', compact('amount', 'projects', 'statuses'));
    }

    public function update(Request $request, Amount $amount)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'status_id' => 'required|exists:statuses,id',
            'profit' => 'required|numeric',
            'outlay' => 'required|numeric',
        ]);

        $amount->update($request->all());

        return redirect()->route('amounts.index')->with('success', 'Amount updated successfully.');
    }

    public function destroy(Amount $amount)
    {
        $amount->delete();

        return redirect()->route('amounts.index')->with('success', 'Amount deleted successfully.');
    }
}
