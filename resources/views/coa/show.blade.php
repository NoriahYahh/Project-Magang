@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail COA</h1>

    <div class="card">
        <div class="card-header">
            Detail COA
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>TM:</strong> {{ $coa->tm }}</li>
                <li class="list-group-item"><strong>IM:</strong> {{ $coa->im }}</li>
                <li class="list-group-item"><strong>ASH Adb:</strong> {{ $coa->ash_adb }}</li>
                <li class="list-group-item"><strong>ASH db:</strong> {{ $coa->ash_db }}</li>
                <li class="list-group-item"><strong>VM:</strong> {{ $coa->vm }}</li>
                <li class="list-group-item"><strong>FC:</strong> {{ $coa->fc }}</li>
                <li class="list-group-item"><strong>TS Adb:</strong> {{ $coa->ts_adb }}</li>
                <li class="list-group-item"><strong>TS db:</strong> {{ $coa->ts_db }}</li>
                <li class="list-group-item"><strong>Adb:</strong> {{ $coa->adb }}</li>
                <li class="list-group-item"><strong>Arb:</strong> {{ $coa->arb }}</li>
                <li class="list-group-item"><strong>Daf:</strong> {{ $coa->daf }}</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('coa.index') }}" class="btn btn-primary">Kembali ke Daftar COA</a>
            <a href="{{ route('coa.edit', $coa->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('coa.destroy', $coa->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
