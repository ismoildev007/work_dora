@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Works List</h1>
        <a href="{{ route('works.create') }}" class="btn btn-primary">Create New Work</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Project</th>
                <th>Manager</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Image</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($works as $work)
                <tr>
                    <td>{{ $work->id }}</td>
                    <td>{{ $work->project->title }}</td>
                    <td>{{ $work->manager->name }}</td>
                    <td>{{ $work->title }}</td>
                    <td>{{ $work->description }}</td>
                    <td>{{ $work->status }}</td>
                    <td>{{ $work->deadline }}</td>
                    <td><img src="{{ asset('storage/' . $work->image) }}" alt="{{ $work->title }}" width="100"></td>
                    <td>
                        @foreach(json_decode($work->images) as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Work Image" width="100">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('works.edit', $work->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('works.destroy', $work->id) }}" method="POST" style="display:inline-block;">
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
