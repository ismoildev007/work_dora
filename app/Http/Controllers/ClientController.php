<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.pdf');
    }
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());
        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.client.edit', compact('client'));
    }

    public function update(StoreClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back();
    }
}

