@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notifications</h1>
        <a href="{{ route('notifications.create') }}" class="btn btn-primary">Xabar yuborish</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Work</th>
                <th>Status</th>
                <th>Message</th>
                <th>Type</th>
                <th>Content</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->user->name }}</td>
                    <td>{{ $notification->work->name ?? 'N/A' }}</td>
                    <td>{{ $notification->status->name }}</td>
                    <td>{{ $notification->message }}</td>
                    <td>{{ $notification->type }}</td>
                    <td>{{ $notification->content }}</td>
                    <td>
                        @if($notification->image)
                            <img src="{{ asset('storage/' . $notification->image) }}" alt="Image" style="width:100px;height:auto;">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('notifications.edit', $notification) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('notifications.destroy', $notification) }}" method="POST" style="display:inline;">
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
