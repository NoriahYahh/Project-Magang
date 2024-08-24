@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar COA</h1>
    <a href="{{ route('coa.create') }}" class="btn btn-primary mb-3">Tambah COA</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($coas->count())
    <table class="table table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th>TM</th>
                <th>IM</th>
                <th>ASH Adb</th>
                <th>ASH db</th>
                <th>VM</th>
                <th>FC</th>
                <th>TS Adb</th>
                <th>TS db</th>
                <th>Adb</th>
                <th>Arb</th>
                <th>Daf</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coas as $coa)
            <tr>
                <td>{{ $coa->tm }}</td>
                <td>{{ $coa->im }}</td>
                <td>{{ $coa->ash_adb }}</td>
                <td>{{ $coa->ash_db }}</td>
                <td>{{ $coa->vm }}</td>
                <td>{{ $coa->fc }}</td>
                <td>{{ $coa->ts_adb }}</td>
                <td>{{ $coa->ts_db }}</td>
                <td>{{ $coa->adb }}</td>
                <td>{{ $coa->arb }}</td>
                <td>{{ $coa->daf }}</td>
                <td>
                    <a href="{{ route('coa.edit', $coa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('coa.destroy', $coa->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="text-center">Tidak ada data COA.</p>
    @endif
</div>
@endsection
