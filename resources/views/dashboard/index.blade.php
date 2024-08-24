@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">BUYER Domestik</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('domestic_companies.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">BUYER Export</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('international_companies.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Surveyor</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('surveyors.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="'domestic_companies.index'">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Shipments
    </div>
    <div class="card-body">
    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1>Shipments</h1>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>GAR</th>
                <th>E/D</th>
                <th>BUYER</th>
                <th>MV</th>
                <th>BG</th>
                <th>Arrival Date</th>
                <th>Departure Date</th>
                <th>Duration (days)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $shipment)
            <tr>
                <td>{{ $shipment->gar }}</td>
                <td>{{ $shipment->type }}</td>
                <td>{{ $shipment->company ? $shipment->company->name : 'N/A' }}</td>
                <td>{{ $shipment->mv ? $shipment->mv : '-' }}</td>
                <td>{{ $shipment->bg ? $shipment->bg : '-' }}</td> <!-- Menambahkan data Barge -->
                <td>{{ $shipment->arrival_date }}</td>
                <td>{{ $shipment->departure_date }}</td>
                <td>{{ $shipment->duration }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('shipments.index') }}" class="btn" style="background-color: #007bff; color: #fff;">Lihat Lengkap</a>

    </div>
  </div>

</div>
@endsection
