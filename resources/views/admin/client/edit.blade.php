@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Client</h1>

        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $client->name }}" required>
            </div>

            <div class="form-group">
                <label for="status_id">Status</label>
                <select name="status_id" id="status_id" class="form-control" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ $client->status_id == $status->id ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $client->phone_number }}" required>
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" name="website" id="website" class="form-control" value="{{ $client->website }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $client->address }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
