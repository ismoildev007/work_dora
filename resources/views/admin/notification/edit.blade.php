@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Notification</h1>
        <form action="{{ route('notifications.update', $notification->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $notification->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="work_id">Work</label>
                <select name="work_id" id="work_id" class="form-control">
                    @foreach($works as $work)
                        <option value="{{ $work->id }}" {{ $notification->work_id == $work->id ? 'selected' : '' }}>{{ $work->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control">{{ $notification->message }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ $notification->status ? 'selected' : '' }}>Read</option>
                    <option value="0" {{ !$notification->status ? 'selected' : '' }}>Unread</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ $notification->type }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control">{{ $notification->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" id="image" class="form-control" value="{{ $notification->image }}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
