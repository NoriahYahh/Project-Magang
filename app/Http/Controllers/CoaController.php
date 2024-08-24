<?php

namespace App\Http\Controllers;

use App\Models\Coa;
use Illuminate\Http\Request;

class CoaController extends Controller
{
    public function index()
    {
    $coas = Coa::all(); // Ambil semua data COA
    return view('coa.index', compact('coas')); // Pastikan nama tampilan sesuai
    }


    public function show($id)
    {
        $coa = Coa::findOrFail($id);
        return view('coa.show', compact('coa'));
    }

    public function create()
    {
        return view('coa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tm' => 'required|string|max:255',
            'im' => 'required|string|max:255',
            'ash_adb' => 'required|numeric',
            'ash_db' => 'required|numeric',
            'vm' => 'required|numeric',
            'fc' => 'required|numeric',
            'ts_adb' => 'required|numeric',
            'ts_db' => 'required|numeric',
            'adb' => 'required|numeric',
            'arb' => 'required|numeric',
            'daf' => 'required|numeric',
        ]);

        Coa::create($request->all());
        return redirect()->route('coa.index')->with('success', 'COA berhasil ditambahkan.');
    }

    public function edit(Coa $coa)
    {
        return view('coa.edit', compact('coa'));
    }

    public function update(Request $request, Coa $coa)
    {
        $request->validate([
            'tm' => 'required|string',
            'im' => 'required|string',
            'ash_adb' => 'required|string',
            'ash_db' => 'required|string',
            'vm' => 'required|string',
            'fc' => 'required|string',
            'ts_adb' => 'required|string',
            'ts_db' => 'required|string',
            'adb' => 'required|string',
            'arb' => 'required|string',
            'daf' => 'required|string',
        ]);

        $coa->update($request->all());
        return redirect()->route('coa.index')->with('success', 'COA berhasil diperbarui.');
    }

    public function destroy(Coa $coa)
    {
        $coa->delete();
        return redirect()->route('coa.index')->with('success', 'COA berhasil dihapus.');
    }
}
