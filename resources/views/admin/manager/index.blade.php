@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Managers List</h1>
        <a href="{{ route('managers.create') }}" class="btn btn-primary">Create New Manager</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($managers as $manager)
                <tr>
                    <td>{{ $manager->id }}</td>
                    <td>{{ $manager->user->name }}</td>
                    <td>{{ $manager->role }}</td>
                    <td>{{ $manager->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('managers.destroy', $manager->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
