<?php

namespace App\Http\Controllers;

use App\Models\MV;
use Illuminate\Http\Request;

class MVController extends Controller
{
    public function index()
    {
        // Mengambil semua data MV
        $mvs = MV::paginate(10);
        return view('mv.index', compact('mvs'));
    }

    public function show($id)
    {
        // Mengambil data MV berdasarkan id
        $mv = MV::findOrFail($id);
        return view('mv.show', compact('mv'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah data MV baru
        return view('mv.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'lot' => 'required|string|max:255',
            'barge' => 'required|string|max:255',
            'cargo' => 'required|string',
            'qty_mt' => 'required|numeric',
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date',
            'jetty' => 'required|string|max:255',
            'tm' => 'required|numeric',
            'im' => 'required|numeric',
            'ash_adb' => 'required|numeric',
            'ash_db' => 'required|numeric',
            'vm' => 'required|numeric',
            'fc' => 'required|numeric',
            'ts' => 'required|numeric',
            'adb' => 'required|numeric',
            'arb' => 'required|numeric',
            'daf' => 'required|numeric',
        ]);
     

        // Buat instance MV baru dan simpan data ke database
        MV::create([
            'lot' => $request->lot,
            'barge' => $request->barge,
            'cargo' => $request->cargo,
            'qty_mt' => $request->qty_mt,
            'arrival_date' => $request->arrival_date,
            'departure_date' => $request->departure_date,
            'jetty' => $request->jetty,
            'tm' => $request->tm,
            'im' => $request->im,
            'ash_adb' => $request->ash_adb,
            'ash_db' => $request->ash_db,
            'vm' => $request->vm,
            'fc' => $request->fc,
            'ts' => $request->ts,
            'adb' => $request->adb,
            'arb' => $request->arb,
            'daf' => $request->daf,
        ]);

        // Redirect kembali ke halaman daftar MV dengan pesan sukses
        return redirect()->route('mv.index')->with('success', 'Data MV berhasil ditambahkan.');
    }

    public function edit(MV $mv)
    {
        // Menampilkan form untuk mengedit data MV
        return view('mv.edit', compact('mv'));
    }

    public function update(Request $request, MV $mv)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'lot' => 'required|string|max:255',
            'barge' => 'required|string|max:255',
            'cargo' => 'required|string',
            'qty_mt' => 'required|numeric',
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date',
            'jetty' => 'required|string|max:255',
            'tm' => 'required|numeric',
            'im' => 'required|numeric',
            'ash_adb' => 'required|numeric',
            'ash_db' => 'required|numeric',
            'vm' => 'required|numeric',
            'fc' => 'required|numeric',
            'ts' => 'required|numeric',
            'adb' => 'required|numeric',
            'arb' => 'required|numeric',
            'daf' => 'required|numeric',
        ]);
        

        // Update data MV
        $mv->update($request->all());

        // Redirect kembali ke halaman daftar MV dengan pesan sukses
        return redirect()->route('mv.index')->with('success', 'Data MV berhasil diperbarui.');
    }

    public function destroy(MV $mv)
    {
        // Hapus data MV
        $mv->delete();

        // Redirect kembali ke halaman daftar MV dengan pesan sukses
        return redirect()->route('mv.index')->with('success', 'Data MV berhasil dihapus.');
    }
}
