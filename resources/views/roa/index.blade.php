@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar ROA</h1>
    <a href="{{ route('roa.create') }}" class="btn btn-primary mb-3">Tambah ROA</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($roas->count())
    <table class="table table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>TM</th>
                <th>IM</th>
                <th>ASH</th>
                <th>VM</th>
                <th>VM2</th>
                <th>FC</th>
                <th>TS</th>
                <th>ADB</th>
                <th>ARB</th>
                <th>DAF</th>
                <th>ANALISYS STANDAR</th>
                <th>COA NUMBER</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roas as $roa)
            <tr>
                <!-- Buat baris tabel dapat diklik -->
                <td>{{ $roa->id }}</td>
                <td>{{ $roa->tm }}</td>
                <td>{{ $roa->im }}</td>
                <td>{{ $roa->ash }}</td>
                <td>{{ $roa->vm }}</td>
                <td>{{ $roa->VM2 }}</td>
                <td>{{ $roa->fc }}</td>
                <td>{{ $roa->ts }}</td>
                <td>{{ $roa->Adb }}</td>
                <td>{{ $roa->Arb }}</td>
                <td>{{ $roa->Daf }}</td>
                <td>{{ $roa->Analisis_Standar }}</td>
                <td>{{ $roa->Coa_number }}</td>
                <td>
                    <a href="{{ route('roa.edit', $roa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('roa.destroy', $roa->id) }}" method="POST" style="display:inline-block;">
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
        <p class="text-center">Tidak ada data ROA.</p>
    @endif
</div>
@endsection
