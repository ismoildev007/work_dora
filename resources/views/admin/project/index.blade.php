@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create New Project</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Department</th>
                <th>Status</th>
                <th>Title</th>
                <th>Description</th>
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
                    <td>{{ $project->status->name }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Image" style="width:100px;height:auto;">
                        @endif
                    </td>
                    <td>
                        @if($project->images)
                            @foreach(json_decode($project->images, true) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Image" style="width:50px;height:auto;">
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
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
