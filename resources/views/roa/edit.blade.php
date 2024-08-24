@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit ROA</h1>

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

    <form action="{{ route('roa.update', $roa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <style>
            .form-group {
                margin-bottom: 15px;
            }

            .form-control {
                width: 100%;
            }

            .btn {
                margin-top: 10px;
            }

            .form-row-inline {
                display: flex;
                gap: 15px;
            }

            .form-row-inline .form-group {
                flex: 1;
            }
        </style>

        <div class="form-group">
            <label for="tm">TM</label>
            <input type="number" step="0.001" class="form-control" id="tm" name="tm" value="{{ $roa->tm }}" placeholder="Masukkan TM" required>
        </div>
        <div class="form-group">
            <label for="im">IM</label>
            <input type="number" step="0.001" class="form-control" id="im" name="im" value="{{ $roa->im }}" placeholder="Masukkan IM" required>
        </div>

        <div class="form-row-inline">
            <div class="form-group">
                <label for="ash">ASH</label>
                <input type="number" step="0.001" class="form-control" id="ash" name="ash" value="{{ $roa->ash }}" placeholder="Masukkan ASH" required>
            </div>
            <div class="form-group">
                <label for="vm">VM</label>
                <input type="number" step="0.001" class="form-control" id="vm" name="vm" value="{{ $roa->vm }}" placeholder="Masukkan VM" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="VM2">VM2</label>
            <input type="number" step="0.001" class="form-control" id="VM2" name="VM2" value="{{ $roa->VM2 }}" placeholder="Masukkan VM2">
        </div>

        <div class="form-group">
            <label for="fc">FC</label>
            <input type="number" step="0.001" class="form-control" id="fc" name="fc" value="{{ $roa->fc }}" placeholder="Masukkan FC" readonly>
        </div>
        <div class="form-group">
            <label for="ts">TS</label>
            <input type="number" step="0.001" class="form-control" id="ts" name="ts" value="{{ $roa->ts }}" placeholder="Masukkan TS" required>
        </div>

        <div class="form-row-inline">
            <div class="form-group">
                <label for="Adb">ADB</label>
                <input type="number" step="0.001" class="form-control" id="Adb" name="Adb" value="{{ $roa->Adb }}" placeholder="Masukkan ADB" required>
            </div>
            <div class="form-group">
                <label for="Arb">ARB</label>
                <input type="number" step="0.001" class="form-control" id="Arb" name="Arb" value="{{ $roa->Arb }}" placeholder="Masukkan ARB" readonly>
            </div>
            <div class="form-group">
                <label for="Daf">DAF</label>
                <input type="number" step="0.001" class="form-control" id="Daf" name="Daf" value="{{ $roa->Daf }}" placeholder="Masukkan DAF" readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="Analisis_Standar">ANALYSIS STANDARD</label>
            <select class="form-control" id="Analisis_Standar" name="Analisis_Standar" required>
                <option value="ASMT" {{ $roa->Analisis_Standar == 'ASMT' ? 'selected' : '' }}>ASMT</option>
                <option value="ISO" {{ $roa->Analisis_Standar == 'ISO' ? 'selected' : '' }}>ISO</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Coa_number">COA NUMBER</label>
            <input type="text" class="form-control" id="Coa_number" name="Coa_number" value="{{ $roa->Coa_number }}" placeholder="Masukkan COA Number" required>
        </div>

        <div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('roa.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('im').addEventListener('input', updateFields);
    document.getElementById('ash').addEventListener('input', updateFields);
    document.getElementById('VM2').addEventListener('input', updateFields);
    document.getElementById('tm').addEventListener('input', updateFields);
    document.getElementById('Adb').addEventListener('input', updateFields);

    function updateFields() {
        const im = parseFloat(document.getElementById('im').value) || 0;
        const ash = parseFloat(document.getElementById('ash').value) || 0;
        const vm2 = parseFloat(document.getElementById('VM2').value) || 0;
        const tm = parseFloat(document.getElementById('tm').value) || 0;
        const adb = parseFloat(document.getElementById('Adb').value) || 0;

        // Menghitung VM
        if (im < 100) {
            const vm = (100 / (100 - im)) * ash;
            document.getElementById('vm').value = vm.toFixed(3);
        } else {
            document.getElementById('vm').value = '';
        }

        // Menghitung FC
        const fcValue = 100 - (im + ash + vm2);
        document.getElementById('fc').value = fcValue.toFixed(3);

        // Menghitung ARB
        if ((100 - im) !== 0) {
            const arb = ((100 - tm) / (100 - im)) * adb;
            document.getElementById('Arb').value = arb.toFixed(3);
        } else {
            document.getElementById('Arb').value = '';
        }

        // Menghitung DAF
        if ((100 - im - ash) !== 0) {
            const daf = (100 / (100 - im - ash)) * adb;
            document.getElementById('Daf').value = daf.toFixed(3);
        } else {
            document.getElementById('Daf').value = '';
        }
    }

    // Memperbarui field saat halaman dimuat pertama kali
    document.addEventListener('DOMContentLoaded', updateFields);
</script>

@endsection
