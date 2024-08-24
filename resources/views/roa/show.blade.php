@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail ROA</h1>
    <a href="{{ route('roa.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar ROA</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $roa->id }}</td>
        </tr>
        <tr>
            <th>TM</th>
            <td>{{ $roa->tm }}</td>
        </tr>
        <tr>
            <th>IM</th>
            <td>{{ $roa->im }}</td>
        </tr>
        <tr>
            <th>ASH</th>
            <td>{{ $roa->ash }}</td>
        </tr>
        <tr>
            <th>VM</th>
            <td>{{ $roa->vm }}</td>
        </tr>
        <tr>
            <th>VM2</th>
            <td>{{ $roa->VM2 }}</td>
        </tr>
        <tr>
            <th>FC</th>
            <td>{{ $roa->fc }}</td>
        </tr>
        <tr>
            <th>TS</th>
            <td>{{ $roa->ts }}</td>
        </tr>
        <tr>
            <th>ADB</th>
            <td>{{ $roa->Adb }}</td>
        </tr>
        <tr>
            <th>ARB</th>
            <td>{{ $roa->Arb }}</td>
        </tr>
        <tr>
            <th>DAF</th>
            <td>{{ $roa->Daf }}</td>
        </tr>
        <tr>
            <th>ANALYSIS STANDAR</th>
            <td>{{ $roa->Daf }}</td>
        </tr>
        <tr>
            <th>COA NUMBER</th>
            <td>{{ $roa->Daf }}</td>
        </tr>
    </table>
</div>
@endsection
