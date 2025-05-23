<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;

class CentreController extends Controller
{
    public function index()
    {
        $centres = Centre::all();
        return view('centres.index', compact('centres'));
    }

    public function create()
    {
        return view('centres.create');
    }

    public function store(Request $request)
    {
        Centre::create($request->all());
        return redirect()->route('centres.index')->with('success', 'Centre ajouté');
    }

    public function show(Centre $centre)
    {
        return view('centres.show', compact('centre'));
    }

    public function edit(Centre $centre)
    {
        return view('centres.edit', compact('centre'));
    }

    public function update(Request $request, Centre $centre)
    {
        $centre->update($request->all());
        return redirect()->route('centres.index')->with('success', 'Mis à jour');
    }

    public function destroy(Centre $centre)
    {
        $centre->delete();
        return redirect()->route('centres.index')->with('success', 'Supprimé');
    }
}
