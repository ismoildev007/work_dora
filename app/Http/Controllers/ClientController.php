<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Status;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('status')->get();
        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {
        $statuses = Status::all();
        return view('admin.client.create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
            'phone_number' => 'required|string|max:20',
            'website' => 'nullable|url',
            'address' => 'nullable|string|max:255',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        $statuses = Status::all();
        return view('admin.client.edit', compact('client', 'statuses'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
            'phone_number' => 'required|string|max:20',
            'website' => 'nullable|url',
            'address' => 'nullable|string|max:255',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
