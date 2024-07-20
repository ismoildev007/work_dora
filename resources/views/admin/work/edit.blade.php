@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Work</h1>
        <form action="{{ route('works.update', $work->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $work->project_id == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="manager_id">Manager</label>
                <select name="manager_id" id="manager_id" class="form-control">
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}" {{ $work->manager_id == $manager->id ? 'selected' : '' }}>{{ $manager->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $work->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $work->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $work->status }}">
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $work->deadline }}">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($work->image)
                    <img src="{{ asset('storage/' . $work->image) }}" alt="{{ $work->title }}" width="100">
                @endif
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
                @if($work->images)
                    @foreach(json_decode($work->images) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Work Image" width="100">
                    @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
