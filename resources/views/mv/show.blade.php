@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail MV</h1>

    <div class="card">
        <div class="card-header">
            <h3>MV ID: {{ $mv->id }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="lot">LOT</label>
                <p>{{ $mv->lot }}</p>
            </div>
            
            <div class="form-group">
                <label for="barge">BARGE</label>
                <p>{{ $mv->barge }}</p>
            </div>
            
            <div class="form-group">
                <label for="cargo">CARGO</label>
                <p>{{ $mv->cargo }}</p>
            </div>
            
            <div class="form-group">
                <label for="qty_mt">QTY MT</label>
                <p>{{ $mv->qty_mt }}</p>
            </div>
            
            <div class="form-group">
                <label for="arrival_date">Commance</label>
                <p>{{ \Carbon\Carbon::parse($mv->arrival_date)->format('Y-m-d') }}</p>
            </div>
            
            <div class="form-group">
                <label for="departure_date">Completed</label>
                <p>{{ \Carbon\Carbon::parse($mv->departure_date)->format('Y-m-d') }}</p>
            </div>
            
            <div class="form-group">
                <label for="jetty">JETTY</label>
                <p>{{ $mv->jetty }}</p>
            </div>
            
            <div class="form-group">
                <label for="tm">TM</label>
                <p>{{ $mv->tm }}</p>
            </div>
            
            <div class="form-group">
                <label for="im">IM</label>
                <p>{{ $mv->im }}</p>
            </div>
            
            <div class="form-group">
                <label for="ash_adb">ASH Adb</label>
                <p>{{ $mv->ash_adb }}</p>
            </div>
            
            <div class="form-group">
                <label for="ash_db">ASH db</label>
                <p>{{ $mv->ash_db }}</p>
            </div>
            
            <div class="form-group">
                <label for="vm">VM</label>
                <p>{{ $mv->vm }}</p>
            </div>
            
            <div class="form-group">
                <label for="fc">FC</label>
                <p>{{ $mv->fc }}</p>
            </div>
            
            <div class="form-group">
                <label for="ts">TS</label>
                <p>{{ $mv->ts }}</p>
            </div>
            
            <div class="form-group">
                <label for="adb">Adb</label>
                <p>{{ $mv->adb }}</p>
            </div>
            
            <div class="form-group">
                <label for="arb">Arb</label>
                <p>{{ $mv->arb }}</p>
            </div>
            
            <div class="form-group">
                <label for="daf">Daf</label>
                <p>{{ $mv->daf }}</p>
            </div>
            <a href="{{ route('mv.index') }}" class="btn btn-primary">Kembali ke Daftar MV</a>
        </div>
    </div>
</div>
@endsection
