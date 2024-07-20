@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Amount</h1>
        <form action="{{ route('amounts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="project_id">Project ID</label>
                <input type="text" class="form-control" id="project_id" name="project_id" required>
            </div>
            <div class="form-group">
                <label for="profit">Profit</label>
                <input type="text" class="form-control" id="profit" name="profit" required>
            </div>
            <div class="form-group">
                <label for="outlay">Outlay</label>
                <input type="text" class="form-control" id="outlay" name="outlay" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
