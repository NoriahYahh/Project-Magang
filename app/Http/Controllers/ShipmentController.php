<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\DomesticCompany;
use App\Models\Surveyor;
use App\Models\InternationalCompany;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Shipment::query();

        // Cek apakah ada pencarian berdasarkan nama MV
        if ($request->has('mv_name') && $request->mv_name) {
            $query->where('mv', 'like', '%' . $request->mv_name . '%');
        }
    
        // Cek apakah ada pencarian berdasarkan nama Barge
        if ($request->has('barge_name') && $request->barge_name) {
            $query->where('bg', 'like', '%' . $request->barge_name . '%');
        }
    
    // Cek apakah ada filter tahun
    if ($request->has('2024') && $request->year) {
        $query->whereYear('arrival_date', $request->year);
    }

    $shipments = $query->get();

    return view('shipments.index', compact('shipments'));


    }
    
    public function create()
    {
        // Ambil data surveyors dari database
    $surveyors = Surveyor::all();
    
    return view('shipments.create', compact('surveyors'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'gar' => 'required|string|max:255',
            'type' => 'required|string|in:domestik,international',
            'mv' => 'nullable|string|max:255', // 'nullable' jika tidak selalu diisi
            'bg' => 'nullable|string|max:255', // 'nullable' jika tidak selalu diisi
            'sp' => 'required|string|max:255',
            'fv' => 'required|string|max:255',
            'fd' => 'required|string|max:255',
            'bf' => 'required|string|max:255',
            'rc' => 'required|string|max:255',
            'ss' => 'required|string|max:255',
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date|after_or_equal:arrival_date',
            'cargo' => 'required|string|max:255',
            'company' => 'required|integer', // Pastikan 'company' adalah ID (integer)
            'dt' => 'required|string|max:255',
            'tg' => 'required|string|max:255',
            'sv' => 'required|string|max:255',
        ]);
    
        // Buat shipment baru dengan data yang di-submit
        Shipment::create([
            'gar' => $request->gar,
            'type' => $request->type,
            'mv' => $request->mv,
            'bg' => $request->bg,
            'sp' => $request->sp,
            'fv' => $request->fv,
            'fd' => $request->fd,
            'bf' => $request->bf,
            'rc' => $request->rc,
            'ss' => $request->ss,
            'arrival_date' => $request->arrival_date,
            'departure_date' => $request->departure_date,
            'cargo' => $request->cargo,
            'company_id' => $request->company,
            'dt' => $request->dt,
            'tg' => $request->tg,
            'sv' => $request->sv,
        ]);
    
        return redirect()->route('shipments.index')->with('success', 'Shipment berhasil ditambahkan.');
    }
    

    public function edit(Shipment $shipment)
    {
        $surveyors = Surveyor::all();
    
    return view('shipments.edit', compact('shipment', 'surveyors'));

    }

    public function update(Request $request, Shipment $shipment)
{
    // Validasi input
    $request->validate([
        'gar' => 'required|string|max:255',
        'type' => 'required|string|in:domestik,international',
        'mv' => 'nullable|string|max:255', // 'nullable' jika tidak selalu diisi
        'bg' => 'nullable|string|max:255', // 'nullable' jika tidak selalu diisi
        'sp' => 'required|string|max:255',
        'fv' => 'required|string|max:255',
        'fd' => 'required|string|max:255',
        'bf' => 'required|string|max:255',
        'rc' => 'required|string|max:255',
        'ss' => 'required|string|max:255',
        'arrival_date' => 'required|date',
        'departure_date' => 'required|date|after_or_equal:arrival_date',
        'cargo' => 'required|string|max:255',
        'company_id' => 'required|integer', // Pastikan 'company_id' adalah ID (integer)
        'dt' => 'required|string|max:255',
        'tg' => 'required|string|max:255',
        'sv' => 'required|string|max:255',
    ]);

    // Update shipment dengan data baru
    $shipment->update([
        'gar' => $request->gar,
        'type' => $request->type,
        'mv' => $request->mv,
        'bg' => $request->bg,
        'sp' => $request->sp,
        'fv' => $request->fv,
        'fd' => $request->fd,
        'bf' => $request->bf,
        'rc' => $request->rc,
        'ss' => $request->ss,
        'arrival_date' => $request->arrival_date,
        'departure_date' => $request->departure_date,
        'cargo' => $request->cargo,
        'company_id' => $request->company_id,
        'dt' => $request->dt,
        'tg' => $request->tg,
        'sv' => $request->sv,
    ]);

    return redirect()->route('shipments.index')->with('success', 'Shipment berhasil diperbarui.');
}


    public function getCompanies(Request $request)
    {
        $type = $request->query('type');
        
        // Validasi nilai type
        if (!in_array($type, ['domestik', 'international'])) {
            return response()->json(['error' => 'Invalid type'], 400);
        }
        
        // Ambil data perusahaan berdasarkan tipe
        if ($type === 'domestik') {
            $companies = DomesticCompany::pluck('name', 'id');
        } else {
            $companies = InternationalCompany::pluck('name', 'id');
        }

        // Kembalikan response dalam format JSON
        return response()->json($companies);
    }

    public function destroy($id)
{
    $shipment = Shipment::findOrFail($id);
    $shipment->delete();

    return redirect()->route('shipments.index')->with('success', 'Pengiriman berhasil dihapus.');
}


}
