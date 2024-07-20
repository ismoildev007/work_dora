<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAmountRequest;
use App\Models\Amount;
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
        return view('admin.amount.create');
    }

    public function store(StoreAmountRequest $request)
    {
        Amount::create($request->validated());
        return redirect()->route('amounts.index')->with('success', 'Amount created successfully.');
    }

    public function edit(Amount $amount)
    {
        return view('admin.amount.edit', compact('amount'));
    }

    public function update(StoreAmountRequest $request, Amount $amount)
    {
        $amount->update($request->validated());
        return redirect()->route('amounts.index')->with('success', 'Amount updated successfully.');
    }

    public function destroy(Amount $amount)
    {
        $amount->delete();
        return redirect()->back();
    }
}

