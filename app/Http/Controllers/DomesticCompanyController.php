<?php

namespace App\Http\Controllers;

use App\Models\DomesticCompany;
use Illuminate\Http\Request;

class DomesticCompanyController extends Controller
{
    public function index()
    {
        $domesticCompanies = DomesticCompany::all();
        return view('domestic_companies.index', compact('domesticCompanies'));
    }

    public function create()
    {
        return view('domestic_companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:domestic_companies,name',
        ]);

        DomesticCompany::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('domestic_companies.index')->with('success', 'Perusahaan domestik berhasil dibuat.');
    }

    public function edit(DomesticCompany $domesticCompany)
    {
        return view('domestic_companies.edit', compact('domesticCompany'));
    }

    public function update(Request $request, DomesticCompany $domesticCompany)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:domestic_companies,name,' . $domesticCompany->id,
        ]);

        $domesticCompany->update($request->all());

        return redirect()->route('domestic_companies.index')->with('success', 'Domestic Company updated successfully.');
    }

    public function destroy(DomesticCompany $domesticCompany)
    {
        $domesticCompany->delete();

        return redirect()->route('domestic_companies.index')->with('success', 'Domestic Company deleted successfully.');
    }
    
}
