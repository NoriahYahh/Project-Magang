@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah MV</h1>
    
    <form action="{{ route('mv.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="lot">LOT</label>
            <input type="text" class="form-control @error('lot') is-invalid @enderror" id="lot" name="lot" required>
            @error('lot')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="barge">BARGE</label>
            <input type="text" class="form-control @error('barge') is-invalid @enderror" id="barge" name="barge" required>
            @error('barge')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="cargo">CARGO</label>
            <input type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo" name="cargo" required>
            @error('cargo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="qty_mt">QTY MT</label>
            <input type="text" class="form-control @error('qty_mt') is-invalid @enderror" id="qty_mt" name="qty_mt" required>
            @error('qty_mt')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="arrival_date">Command</label>
            <input type="date" class="form-control @error('arrival_date') is-invalid @enderror" id="arrival_date" name="arrival_date" >
            @error('arrival_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="departure_date">Completed</label>
            <input type="date" class="form-control @error('departure_date') is-invalid @enderror" id="departure_date" name="departure_date" >
            @error('departure_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        
        <div class="form-group">
            <label for="jetty">JETTY</label>
            <input type="text" class="form-control @error('jetty') is-invalid @enderror" id="jetty" name="jetty"  required>
            @error('jetty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="tm">TM</label>
            <input type="text" class="form-control @error('tm') is-invalid @enderror" id="tm" name="tm" required>
            @error('tm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="im">IM</label>
            <input type="text" class="form-control @error('im') is-invalid @enderror" id="im" name="im" required>
            @error('im')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="ash_adb">ASH Adb</label>
            <input type="text" class="form-control @error('ash_adb') is-invalid @enderror" id="ash_adb" name="ash_adb" required>
            @error('ash_adb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="ash_db">ASH db</label>
            <input type="text" class="form-control @error('ash_db') is-invalid @enderror" id="ash_db" name="ash_db" required>
            @error('ash_db')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="vm">VM</label>
            <input type="text" class="form-control @error('vm') is-invalid @enderror" id="vm" name="vm" required>
            @error('vm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="fc">FC</label>
            <input type="text" class="form-control @error('fc') is-invalid @enderror" id="fc" name="fc" required>
            @error('fc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="ts">TS</label>
            <input type="text" class="form-control @error('ts') is-invalid @enderror" id="ts" name="ts" required>
            @error('ts')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="adb">Adb</label>
            <input type="text" class="form-control @error('adb') is-invalid @enderror" id="adb" name="adb" required>
            @error('adb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="arb">Arb</label>
            <input type="text" class="form-control @error('arb') is-invalid @enderror" id="arb" name="arb" required>
            @error('arb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="daf">Daf</label>
            <input type="text" class="form-control @error('daf') is-invalid @enderror" id="daf" name="daf" required>
            @error('daf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
