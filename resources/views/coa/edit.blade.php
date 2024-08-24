@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit COA</h1>

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

    <form action="{{ route('coa.update', $coa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tm">TM</label>
            <input type="text" class="form-control" id="tm" name="tm" value="{{ old('tm', $coa->tm) }}" placeholder="Masukkan TM" required>
        </div>

        <div class="form-group">
            <label for="im">IM</label>
            <input type="text" class="form-control" id="im" name="im" value="{{ old('im', $coa->im) }}" placeholder="Masukkan IM" required>
        </div>

        <div class="form-group">
            <label for="ash_adb">ASH Adb</label>
            <input type="text" class="form-control" id="ash_adb" name="ash_adb" value="{{ old('ash_adb', $coa->ash_adb) }}" placeholder="Masukkan ASH Adb" required>
        </div>

        <div class="form-group">
            <label for="ash_db">ASH db</label>
            <input type="text" class="form-control" id="ash_db" name="ash_db" value="{{ old('ash_db', $coa->ash_db) }}" placeholder="Masukkan ASH db" required>
        </div>

        <div class="form-group">
            <label for="vm">VM</label>
            <input type="text" class="form-control" id="vm" name="vm" value="{{ old('vm', $coa->vm) }}" placeholder="Masukkan VM" required>
        </div>

        <div class="form-group">
            <label for="fc">FC</label>
            <input type="text" class="form-control" id="fc" name="fc" value="{{ old('fc', $coa->fc) }}" placeholder="Masukkan FC" required>
        </div>

        <div class="form-group">
            <label for="ts_adb">TS Adb</label>
            <input type="text" class="form-control" id="ts_adb" name="ts_adb" value="{{ old('ts_adb', $coa->ts_adb) }}" placeholder="Masukkan TS Adb" required>
        </div>

        <div class="form-group">
            <label for="ts_db">TS Db</label>
            <input type="text" class="form-control" id="ts_db" name="ts_db" value="{{ old('ts_db', $coa->ts_db) }}" placeholder="Masukkan TS Db" required>
        </div>

        <div class="form-group">
            <label for="adb">Adb</label>
            <input type="text" class="form-control" id="adb" name="adb" value="{{ old('adb', $coa->adb) }}" placeholder="Masukkan Adb" required>
        </div>

        <div class="form-group">
            <label for="arb">Arb</label>
            <input type="text" class="form-control" id="arb" name="arb" value="{{ old('arb', $coa->arb) }}" placeholder="Masukkan Arb" required>
        </div>

        <div class="form-group">
            <label for="daf">Daf</label>
            <input type="text" class="form-control" id="daf" name="daf" value="{{ old('daf', $coa->daf) }}" placeholder="Masukkan Daf" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('coa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
