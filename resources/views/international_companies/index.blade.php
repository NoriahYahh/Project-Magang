@extends('layouts.app')

@section('content')
<div class="container">
    <h1>International Companies</h1>
    <a href="{{ route('international_companies.create') }}" class="btn btn-primary mb-3">Tambah International Company</a>

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
            @foreach($internationalCompanies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>
                        <a href="{{ route('international_companies.edit', $company) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('international_companies.destroy', $company) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
