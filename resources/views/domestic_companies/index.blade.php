@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Domestic Companies</h1>
    <a href="{{ route('domestic_companies.create') }}" class="btn btn-primary mb-3">Tambah Domestic Company</a>

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
            @foreach($domesticCompanies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>
                        <a href="{{ route('domestic_companies.edit', $company) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('domestic_companies.destroy', $company) }}" method="POST" style="display:inline;">
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
