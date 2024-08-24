@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shipments</h1>

    <!-- Form Filter Bulan dan Tahun -->
    <form action="{{ route('shipments.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <label for="year">Tahun</label>
                <select name="year" id="year" class="form-control">
                    <option value="">Pilih Tahun</option>
                    @foreach(['2023', '2024', '2025', '2026', '2027'] as $year)
                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="month">Bulan</label>
                <select name="month" id="month" class="form-control">
                    <option value="">Pilih Bulan</option>
                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $index => $month)
                        <option value="{{ $index + 1 }}" {{ request('month') == $index + 1 ? 'selected' : '' }}>
                            {{ $month }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Form Pencarian berdasarkan ID -->
    <form action="{{ route('shipments.search') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <label for="search">Cari berdasarkan Nama</label>
                <input type="text" name="search" name="search" class="form-control" placeholder="Masukkan ID Shipment" value="{{ request('search') }}">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    <div class="mb-3">
        <a href="{{ route('shipments.create') }}" class="btn btn-primary">Tambah Shipment</a>
        <a href="{{ route('export') }}" class="btn btn-success">Download Excel</a>
    </div>

    <!-- Tampilkan pesan sukses jika ada -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tabel Shipments -->
    <table class="table table-bordered text-center">
        <thead class="thead-custom">
            <tr>
                <th colspan="2">SHIPMENT</th>
                <th rowspan="2">MV</th>
                <th rowspan="2">BARGE</th>
                <th rowspan="2">STOWAGE PLAN</th>
                <th rowspan="2">FIGURE VESSEL</th>
                <th rowspan="2">FINAL DRAFT</th>
                <th colspan="3">RETURN CARGO</th>
                <th colspan="3">LOADING TIME</th>
                <th rowspan="2">CARGO</th>
                <th rowspan="2">BUYER</th>
                <th rowspan="2">DESTINATION</th>
                <th rowspan="2">B/L</th>
                <th rowspan="2">SURVEYOR</th>
                <th rowspan="2">Actions</th>
            </tr>
            <tr>
                <th>GAR</th>
                <th>E/D</th>
                <th>BARGE FIGURE (R/C)</th>
                <th>R/C BARGE</th>
                <th>SHORTAGE/SURPLUS</th>
                <th>Commance</th>
                <th>Completed</th>
                <th>Duration (Day)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $shipment)
            <tr>
                <td>{{ $shipment->gar }}</td>
                <td>{{ $shipment->type }}</td>
                <td>{{ $shipment->mv ? $shipment->mv : '-' }}</td>
                <td>{{ $shipment->bg ? $shipment->bg : '-' }}</td>
                <td>{{ $shipment->sp }}</td>
                <td>{{ $shipment->fv }}</td>
                <td>{{ $shipment->fd }}</td>
                <td>{{ $shipment->bf }}</td>
                <td>{{ $shipment->rc }}</td>
                <td>{{ $shipment->ss }}</td>
                <td>{{ \Carbon\Carbon::parse($shipment->arrival_date)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($shipment->departure_date)->format('Y-m-d') }}</td>
                <td>{{ $shipment->duration }}</td>
                <td>{{ $shipment->cargo }}</td>
                <td>{{ $shipment->company ? $shipment->company->name : 'N/A' }}</td>
                <td>{{ $shipment->dt }}</td>
                <td>{{ $shipment->tg }}</td>
                <td>{{ $shipment->sv }}</td>
                <td>
                    <div style="display: flex; justify-content: center; gap: 10px;">
                        <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('shipments.destroy', $shipment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .thead-custom th {
        vertical-align: middle;
    }
</style>
@endsection
