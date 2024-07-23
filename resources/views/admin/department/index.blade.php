@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Departments</h1>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">Create New Department</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->status->name }}</td>
                    <td>{{ $department->phone_number }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('departments.destroy', $department) }}" method="POST" style="display:inline;">
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
