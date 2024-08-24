@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Surveyors</h1>
    <a href="{{ route('surveyors.create') }}" class="btn btn-primary mb-3">Tambah Surveyor</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surveyors as $surveyor)
                <tr>
                    <td>{{ $surveyor->name }}</td>
                    <td>
                        <a href="{{ route('surveyors.edit', $surveyor) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('surveyors.destroy', $surveyor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
