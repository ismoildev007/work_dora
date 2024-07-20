@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Status List</h1>
        <a href="{{ route('statuses.create') }}" class="btn btn-primary">Create New Status</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Color</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statuses as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td style="background-color: {{ $status->color }}">{{ $status->color }}</td>
                    <td>
                        <a href="{{ route('statuses.edit', $status->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" style="display:inline-block;">
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
