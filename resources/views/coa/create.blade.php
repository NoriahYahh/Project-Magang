@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah COA Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('coa.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tm">TM</label>
            <input type="text" class="form-control" id="tm" name="tm" value="{{ old('tm') }}" placeholder="Masukkan TM" required>
        </div>

        <div class="form-group">
            <label for="im">IM</label>
            <input type="text" class="form-control" id="im" name="im" value="{{ old('im') }}" placeholder="Masukkan IM" required>
        </div>

        <div class="form-group">
            <label for="ash_adb">ASH Adb</label>
            <input type="text" class="form-control" id="ash_adb" name="ash_adb" value="{{ old('ash_adb') }}" placeholder="Masukkan ASH Adb" required>
        </div>

        <div class="form-group">
            <label for="ash_db">ASH db</label>
            <input type="text" class="form-control" id="ash_db" name="ash_db" value="{{ old('ash_db') }}" placeholder="Masukkan ASH db" required>
        </div>

        <div class="form-group">
            <label for="vm">VM</label>
            <input type="text" class="form-control" id="vm" name="vm" value="{{ old('vm') }}" placeholder="Masukkan VM" required>
        </div>

        <div class="form-group">
            <label for="fc">FC</label>
            <input type="text" class="form-control" id="fc" name="fc" value="{{ old('fc') }}" placeholder="Masukkan FC" required>
        </div>

        <div class="form-group">
            <label for="ts_adb">TS Adb</label>
            <input type="text" class="form-control" id="ts_adb" name="ts_adb" value="{{ old('ts_adb') }}" placeholder="Masukkan TS Adb" required>
        </div>

        <div class="form-group">
            <label for="ts_db">TS Db</label>
            <input type="text" class="form-control" id="ts_db" name="ts_db" value="{{ old('ts_db') }}" placeholder="Masukkan TS Db" required>
        </div>

        <div class="form-group">
            <label for="adb">Adb</label>
            <input type="text" class="form-control" id="adb" name="adb" value="{{ old('adb') }}" placeholder="Masukkan Adb" required>
        </div>

        <div class="form-group">
            <label for="arb">Arb</label>
            <input type="text" class="form-control" id="arb" name="arb" value="{{ old('arb') }}" placeholder="Masukkan Arb" required>
        </div>

        <div class="form-group">
            <label for="daf">Daf</label>
            <input type="text" class="form-control" id="daf" name="daf" value="{{ old('daf') }}" placeholder="Masukkan Daf" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('coa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
