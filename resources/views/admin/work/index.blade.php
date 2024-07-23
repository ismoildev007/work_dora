@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Works</h1>
        <a href="{{ route('works.create') }}" class="btn btn-primary mb-3">Create New Work</a>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Project</th>
                <th>Manager</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($works as $work)
                <tr>
                    <td>{{ $work->title }}</td>
                    <td>{{ $work->project->title }}</td>
                    <td>{{ $work->manager->role }}</td>
                    <td>{{ $work->status->name }}</td>
                    <td>{{ $work->deadline }}</td>
                    <td>
                        <a href="{{ route('works.edit', $work) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('works.destroy', $work) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
