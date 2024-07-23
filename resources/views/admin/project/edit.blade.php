@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>

        <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data" onsubmit="updateEditorContent()">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="client_id">Client</label>
                <select name="client_id" id="client_id" class="form-control" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ $client->id == $project->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="department_id">Department</label>
                <select name="department_id" id="department_id" class="form-control" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $project->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status_id">Status</label>
                <select name="status_id" id="status_id" class="form-control" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ $status->id == $project->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}" required>
            </div>

            <div class="form-group">
                <label for="description_uz">Description</label>
                <div id="editor_uz" style="height: 300px;"></div>
                <input type="hidden" name="description" id="description_uz" value="{{ $project->description }}">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Image" style="width:100px;height:auto;margin-top:10px;">
                @endif
            </div>

            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
                @if($project->images)
                    @foreach(json_decode($project->images, true) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Image" style="width:50px;height:auto;margin-top:10px;">
                    @endforeach
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script>
        var editorUz = new Quill('#editor_uz', {
            theme: 'snow'
        });

        // Dastlabki qiymatni yuklash
        editorUz.root.innerHTML = document.getElementById('description_uz').value;

        // Formani yuborishdan oldin description inputni yangilash
        function updateEditorContent() {
            document.getElementById('description_uz').value = editorUz.root.innerHTML;
        }
    </script>
@endsection
