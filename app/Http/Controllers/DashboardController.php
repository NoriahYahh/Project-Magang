<?php

namespace App\Http\Controllers;
use App\Models\Shipment;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $shipments = Shipment::all();
        return view('dashboard.index', compact('shipments')); // Pastikan path view ini sesuai dengan lokasi file index.blade.php
    }
}

