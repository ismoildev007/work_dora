@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Project</h1>

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="client_id">Client</label>
                <select name="client_id" id="client_id" class="form-control" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="department_id">Department</label>
                <select name="department_id" id="department_id" class="form-control" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status_id">Status</label>
                <select name="status_id" id="status_id" class="form-control" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Description_uz</h4>
                                <p class="sub-header">Snow is a clean, flat toolbar theme.</p>
                                <div id="editor_uz" style="height: 300px;">
                                    <!-- Quill editor content -->
                                </div>
                                <input type="hidden" name="description" id="description_uz">
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div><!-- end col -->
                </div>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script>
        var editorUz = new Quill('#editor_uz', {
            theme: 'snow'
        });

        function updateEditorContent() {
            document.getElementById('description_uz').value = editorUz.root.innerHTML;
        }
    </script>
@endsection
