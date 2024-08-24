<?php

namespace App\Http\Controllers;

use App\Models\Surveyor;
use Illuminate\Http\Request;

class SurveyorController extends Controller
{
    public function index()
    {
        $surveyors = Surveyor::all();
        return view('surveyors.index', compact('surveyors'));
    }

    public function create()
    {
        return view('surveyors.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:surveyors,name',
    ]);

    Surveyor::create([
        'name' => $request->input('name'),
    ]);

    return redirect()->route('surveyors.index')->with('success', 'Surveyor created successfully.');
}


    public function edit(Surveyor $surveyor)
    {
        return view('surveyors.edit', compact('surveyor'));
    }

    public function update(Request $request, Surveyor $surveyor)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:surveyors,name,' . $surveyor->id,
        ]);

        $surveyor->update($request->all());

        return redirect()->route('surveyors.index')->with('success', 'Surveyor updated successfully.');
    }

    public function destroy(Surveyor $surveyor)
    {
        $surveyor->delete();

        return redirect()->route('surveyors.index')->with('success', 'Surveyor deleted successfully.');
    }
}
