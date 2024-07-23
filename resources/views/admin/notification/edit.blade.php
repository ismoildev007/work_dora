@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Notification</h1>

        <form action="{{ route('notifications.update', $notification) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $notification->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="work_id">Work</label>
                <select name="work_id" id="work_id" class="form-control">
                    @foreach($works as $work)
                        <option value="{{ $work->id }}" {{ $work->id == $notification->work_id ? 'selected' : '' }}>
                            {{ $work->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status_id">Status</label>
                <select name="status_id" id="status_id" class="form-control" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ $status->id == $notification->status_id ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <input type="text" name="message" id="message" class="form-control" value="{{ $notification->message }}" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ $notification->type }}" required>
            </div>
            <div class="form-group">
                <label for="description_uz">Description</label>
                <div id="editor_uz" style="height: 300px;"></div>
                <input type="hidden" name="content" id="description_uz" value="{{ $notification->content }}">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($notification->image)
                    <img src="{{ asset('storage/' . $notification->image) }}" alt="Image" style="width:100px;height:auto;margin-top:10px;">
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
