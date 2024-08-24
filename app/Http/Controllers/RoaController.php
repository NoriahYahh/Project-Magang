<?php

namespace App\Http\Controllers;

use App\Models\ROA;
use Illuminate\Http\Request;

class ROAController extends Controller
{
    public function index()
    {
        $roas = ROA::all();
        return view('roa.index', compact('roas'));
    }

    public function show($id)
    {
        $roa = Roa::findOrFail($id);
        return view('roa.show', compact('roa'));
    }

    public function create()
    {
        return view('roa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tm' => 'required|string',
            'im' => 'required|string',
            'ash' => 'required|string',
            'vm' => 'required|string',
            'fc' => 'required|string',
            'ts' => 'required|string',
            'Adb' => 'required|string',
            'Arb' => 'required|string',
            'Daf' => 'required|string',
            'Analisis_Standar' => 'required|string',
            'Coa_number' => 'required|string',
        ]);

        ROA::create($request->all());
        return redirect()->route('roa.index');
    }

    public function edit(ROA $roa)
    {
        return view('roa.edit', compact('roa'));
    }

    public function update(Request $request, ROA $roa)
    {
        $request->validate([
            'tm' => 'required|string',
            'im' => 'required|string',
            'ash' => 'required|string',
            'vm' => 'required|string',
            'fc' => 'required|string',
            'ts' => 'required|string',
            'Adb' => 'required|string',
            'Arb' => 'required|string',
            'Daf' => 'required|string',
            'Analisis_Standar' => 'required|string',
            'Coa_number' => 'required|string',
        ]);

        $roa->update($request->all());
        return redirect()->route('roa.index');
    }

    public function destroy(ROA $roa)
    {
        $roa->delete();
        return redirect()->route('roa.index');
    }
}
