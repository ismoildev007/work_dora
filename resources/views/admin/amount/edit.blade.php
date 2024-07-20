@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Amount</h1>
        <form action="{{ route('amounts.update', $amount->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="project_id">Project ID</label>
                <input type="text" class="form-control" id="project_id" name="project_id" value="{{ $amount->project_id }}" required>
            </div>
            <div class="form-group">
                <label for="profit">Profit</label>
                <input type="text" class="form-control" id="profit" name="profit" value="{{ $amount->profit }}" required>
            </div>
            <div class="form-group">
                <label for="outlay">Outlay</label>
                <input type="text" class="form-control" id="outlay" name="outlay" value="{{ $amount->outlay }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
