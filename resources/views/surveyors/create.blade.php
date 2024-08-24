@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Surveyor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surveyors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Surveyor Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
