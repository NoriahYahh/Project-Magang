<?php

namespace App\Http\Controllers;

use App\Models\InternationalCompany;
use Illuminate\Http\Request;

class InternationalCompanyController extends Controller
{
    public function index()
    {
        $internationalCompanies = InternationalCompany::all();
        return view('international_companies.index', compact('internationalCompanies'));
    }

    public function create()
    {
        return view('international_companies.create');
    }

    public function store(Request $request)
{
    // Validasi input nama perusahaan
    $request->validate([
        'name' => 'required|string|max:255|unique:international_companies,name',
    ]);

    // Simpan perusahaan baru
    InternationalCompany::create([
        'name' => $request->input('name'),
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('international_companies.index')
                     ->with('success', 'Perusahaan internasional berhasil dibuat.');
}


    public function edit(InternationalCompany $internationalCompany)
    {
        return view('international_companies.edit', compact('internationalCompany'));
    }

    public function update(Request $request, InternationalCompany $internationalCompany)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:international_companies,name,' . $internationalCompany->id,
        ]);

        $internationalCompany->update($request->all());

        return redirect()->route('international_companies.index')->with('success', 'International Company updated successfully.');
    }

    public function destroy(InternationalCompany $internationalCompany)
    {
        $internationalCompany->delete();

        return redirect()->route('international_companies.index')->with('success', 'International Company deleted successfully.');
    }
}
