@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit MV</h1>
    
    <form action="{{ route('mv.update', $mv->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="lot">LOT</label>
            <input type="text" class="form-control @error('lot') is-invalid @enderror" id="lot" name="lot" value="{{ old('lot', $mv->lot) }}" required>
            @error('lot')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="barge">BARGE</label>
            <input type="text" class="form-control @error('barge') is-invalid @enderror" id="barge" name="barge" value="{{ old('barge', $mv->barge) }}" required>
            @error('barge')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="cargo">CARGO</label>
            <input type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo" name="cargo" value="{{ old('cargo', $mv->cargo) }}" required>
            @error('cargo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="qty_mt">QTY MT</label>
            <input type="text" class="form-control @error('qty_mt') is-invalid @enderror" id="qty_mt" name="qty_mt" value="{{ old('qty_mt', $mv->qty_mt) }}" required>
            @error('qty_mt')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="arrival_date">Command</label>
            <input type="date" class="form-control @error('arrival_date') is-invalid @enderror" id="arrival_date" name="arrival_date" value="{{ old('arrival_date', $mv->arrival_date ?? '') }}">
            @error('arrival_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="departure_date">Completed</label>
            <input type="date" class="form-control @error('departure_date') is-invalid @enderror" id="departure_date" name="departure_date" value="{{ old('departure_date', $mv->departure_date ?? '') }}">
            @error('departure_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        
        <div class="form-group">
            <label for="jetty">JETTY</label>
            <input type="text" class="form-control @error('jetty') is-invalid @enderror" id="jetty" name="jetty" value="{{ old('jetty', $mv->jetty) }}" required>
            @error('jetty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="tm">TM</label>
            <input type="text" class="form-control @error('tm') is-invalid @enderror" id="tm" name="tm" value="{{ old('tm', $mv->tm) }}" required>
            @error('tm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="im">IM</label>
            <input type="text" class="form-control @error('im') is-invalid @enderror" id="im" name="im" value="{{ old('im', $mv->im) }}" required>
            @error('im')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="ash_adb">ASH Adb</label>
            <input type="text" class="form-control @error('ash_adb') is-invalid @enderror" id="ash_adb" name="ash_adb" value="{{ old('ash_adb', $mv->ash_adb) }}" required>
            @error('ash_adb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="ash_db">ASH db</label>
            <input type="text" class="form-control @error('ash_db') is-invalid @enderror" id="ash_db" name="ash_db" value="{{ old('ash_db', $mv->ash_db) }}" required>
            @error('ash_db')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="vm">VM</label>
            <input type="text" class="form-control @error('vm') is-invalid @enderror" id="vm" name="vm" value="{{ old('vm', $mv->vm) }}" required>
            @error('vm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="fc">FC</label>
            <input type="text" class="form-control @error('fc') is-invalid @enderror" id="fc" name="fc" value="{{ old('fc', $mv->fc) }}" required>
            @error('fc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="ts">TS</label>
            <input type="text" class="form-control @error('ts') is-invalid @enderror" id="ts" name="ts" value="{{ old('ts', $mv->ts) }}" required>
            @error('ts')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="adb">Adb</label>
            <input type="text" class="form-control @error('adb') is-invalid @enderror" id="adb" name="adb" value="{{ old('adb', $mv->adb) }}" required>
            @error('adb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="arb">Arb</label>
            <input type="text" class="form-control @error('arb') is-invalid @enderror" id="arb" name="arb" value="{{ old('arb', $mv->arb) }}" required>
            @error('arb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="daf">Daf</label>
            <input type="text" class="form-control @error('daf') is-invalid @enderror" id="daf" name="daf" value="{{ old('daf', $mv->daf) }}" required>
            @error('daf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
