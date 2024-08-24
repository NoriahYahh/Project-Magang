@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar MV</h1>
    <a href="{{ route('mv.create') }}" class="btn btn-primary mb-3">Tambah MV</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($mvs->count())
    <table class="table table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>LOT</th>
                <th>BARGE</th>
                <th>CARGO</th>
                <th>QTY MT</th>
                <th>Commance</th>
                <th>Completed</th>
                <th>JETTY</th>
                <th>TM</th>
                <th>IM</th>
                <th>ASH Adb</th>
                <th>ASH db</th>
                <th>VM</th>
                <th>FC</th>
                <th>TS</th>
                <th>Adb</th>
                <th>Arb</th>
                <th>Daf</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mvs as $mv)
            <tr>
                <td>{{ $mv->id }}</td>
                <td>{{ $mv->lot }}</td>
                <td>{{ $mv->barge }}</td>
                <td>{{ $mv->cargo }}</td>
                <td>{{ $mv->qty_mt }}</td>
                <td>{{ \Carbon\Carbon::parse($mv->arrival_date)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($mv->departure_date)->format('Y-m-d') }}</td>
                <td>{{ $mv->jetty }}</td>
                <td>{{ $mv->tm }}</td>
                <td>{{ $mv->im }}</td>
                <td>{{ $mv->ash_adb }}</td>
                <td>{{ $mv->ash_db }}</td>
                <td>{{ $mv->vm }}</td>
                <td>{{ $mv->fc }}</td>
                <td>{{ $mv->ts }}</td>
                <td>{{ $mv->adb }}</td>
                <td>{{ $mv->arb }}</td>
                <td>{{ $mv->daf }}</td>
                <td>
                    <a href="{{ route('mv.edit', $mv->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('mv.destroy', $mv->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            {{-- ini layout pagination yang berada di vendor/laravel/framwork/src/illumnate/pagination --}}
{{ $mvs->links('pagination::bootstrap-4') }}
        </tbody>
    </table>
    @else
        <p class="text-center">Tidak ada data MV.</p>
    @endif
</div>
@endsection
