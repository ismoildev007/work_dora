@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notifications List</h1>
        <a href="{{ route('notifications.create') }}" class="btn btn-primary">Create New Notification</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Work</th>
                <th>Message</th>
                <th>Status</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->user->name }}</td>
                    <td>{{ $notification->work->title }}</td>
                    <td>{{ $notification->message }}</td>
                    <td>{{ $notification->status ? 'Read' : 'Unread' }}</td>
                    <td>{{ $notification->type }}</td>
                    <td>
                        <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display:inline-block;">
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
