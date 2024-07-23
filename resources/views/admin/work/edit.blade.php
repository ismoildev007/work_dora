@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Work</h1>

        <form action="{{ route('works.update', $work) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $project->id == $work->project_id ? 'selected' : '' }}>{{ $project->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="manager_id">Manager</label>
                <select name="manager_id" id="manager_id" class="form-control" required>
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}" {{ $manager->id == $work->manager_id ? 'selected' : '' }}>{{ $manager->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status_id">Status</label>
                <select name="status_id" id="status_id" class="form-control" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ $status->id == $work->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $work->title }}" required>
            </div>
            <div class="form-group">
                <label for="description_uz">Description</label>
                <div id="editor_uz" style="height: 300px;"></div>
                <input type="hidden" name="description" id="description_uz" value="{{ $work->description }}">
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $work->deadline }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($work->image)
                    <img src="{{ asset('storage/' . $work->image) }}" alt="Image" style="width:100px;height:auto;margin-top:10px;">
                @endif
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
                @if($work->images)
                    @foreach(json_decode($work->images, true) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Image" style="width:50px;height:auto;margin-top:10px;">
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="employees">Employees</label>
                <select name="employees[]" id="employees" class="form-control" multiple>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ in_array($employee->id, $selectedEmployees) ? 'selected' : '' }}>{{ $employee->name }}</option>
                    @endforeach
                </select>
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
