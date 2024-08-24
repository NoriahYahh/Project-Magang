@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Domestic Company</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('domestic_companies.update', $domesticCompany) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Company Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $domesticCompany->name) }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
