@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah ROA</h1>

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

    <form action="{{ route('roa.store') }}" method="POST">
        @csrf
        <style>
            .form-group {
                margin-bottom: 15px; /* Jarak antar elemen form */
            }

            .form-control {
                width: 100%; /* Memastikan input mengambil seluruh lebar yang tersedia */
            }

            .btn {
                margin-top: 10px;
            }

            .form-row-inline {
                display: flex;
                gap: 15px; /* Jarak antara elemen form */
            }

            .form-row-inline .form-group {
                flex: 1; /* Membuat setiap form-group mengambil lebar yang sama */
            }
        </style>

        <div class="form-group">
            <label for="tm">TM</label>
            <input type="text" class="form-control" id="tm" name="tm" placeholder="Masukkan TM" required>
        </div>
        <div class="form-group">
            <label for="im">IM</label>
            <input type="number" class="form-control" id="im" name="im" placeholder="Masukkan IM" step="0.01" required>
        </div>

        <div class="form-row-inline">
            <div class="form-group">
                <label for="ash">ASH</label>
                <input type="number" step="0.01" class="form-control" id="ash" name="ash" placeholder="Masukkan ASH" required>
            </div>
            <div class="form-group">
                <label for="vm">VM</label>
                <input type="text" class="form-control" id="vm" name="vm" placeholder="Masukkan VM" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="VM2">VM2</label>
            <input type="number" step="0.01" class="form-control" id="VM2" name="VM2" placeholder="Masukkan VM2">
        </div>

        <div class="form-group">
            <label for="fc">FC</label>
            <input type="text" class="form-control" id="fc" name="fc" placeholder="Masukkan FC" readonly>
        </div>
        <div class="form-group">
            <label for="ts">TS</label>
            <input type="text" class="form-control" id="ts" name="ts" placeholder="Masukkan TS" required>
        </div>

        <div class="form-row-inline">
            <div class="form-group">
                <label for="Adb">ADB</label>
                <input type="text" class="form-control" id="Adb" name="Adb" placeholder="Masukkan ADB" required>
            </div>
            <div class="form-group">
                <label for="Arb">ARB</label>
                <input type="text" class="form-control" id="Arb" name="Arb" placeholder="Masukkan ARB" readonly>
            </div>
            <div class="form-group">
                <label for="Daf">DAF</label>
                <input type="text" class="form-control" id="Daf" name="Daf" placeholder="Masukkan DAF" readonly>
            </div>
        </div>

        <!-- Dropdown for Analisis Standar -->
        <div class="form-group">
            <label for="Analisis_Standar">ANALYSIS STANDART</label>
            <select class="form-control" id="Analisis_Standar" name="Analisis_Standar" required>
                <option value="">Pilih Analisis Standar</option>
                <option value="ASMT">ASMT</option>
                <option value="ISO">ISO</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Coa_number">COA NUMBER</label>
            <input type="text" class="form-control" id="Coa_number" name="Coa_number" placeholder="Masukkan Coa_number" required>
        </div>

        <div>
            <button type="submit" class="btn btn-success">Simpan</button>
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

        // Calculate VM
        if (im < 100) {
            const vm = (100 / (100 - im)) * (ash || 0);
            document.getElementById('vm').value = vm.toFixed(3); // Menampilkan 3 angka desimal
        } else {
            document.getElementById('vm').value = '';
        }

        // Calculate FC
        const fc = (100 - (im + ash + vm2)).toFixed(3); // Menampilkan 3 angka desimal
        document.getElementById('fc').value = fc;

        // Calculate ARB
        if (100 - im !== 0) {
            const arb = ((100 - tm) / (100 - im)) * adb;
            document.getElementById('Arb').value = arb.toFixed(3); // Menampilkan 3 angka desimal
        } else {
            document.getElementById('Arb').value = '';
        }

        // Calculate DAF
        if (100 - im - ash !== 0) {
            const daf = (100 / (100 - im - ash)) * adb;
            document.getElementById('Daf').value = daf.toFixed(3); // Menampilkan 3 angka desimal
        } else {
            document.getElementById('Daf').value = '';
        }
    }
</script>


@endsection
