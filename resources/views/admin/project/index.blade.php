@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects List</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create New Project</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Department</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Image</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->client->name }}</td>
                    <td>{{ $project->department->name }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->status }}</td>
                    <td><img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" width="100"></td>
                    <td>
                        @foreach(json_decode($project->images) as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Project Image" width="100">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
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
