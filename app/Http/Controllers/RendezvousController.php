<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rendezvous;

class RendezvousController extends Controller
{
    public function index()
    {
        $rendezvous = Rendezvous::all();
        return view('rendezvous.index', compact('rendezvous'));
    }

    public function create()
    {
        return view('rendezvous.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'cin' => 'required',
            'telephone' => 'required',
            'centre' => 'required',
            'date' => 'required|date',
            'heure' => 'required'
        ]);

        Rendezvous::create($request->all());
        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous enregistré avec succès.');
    }

    public function show(Rendezvous $rendezvous)
    {
        return view('rendezvous.show', compact('rendezvous'));
    }

    public function edit(Rendezvous $rendezvous)
    {
        return view('rendezvous.edit', compact('rendezvous'));
    }

    public function update(Request $request, Rendezvous $rendezvous)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'cin' => 'required',
            'telephone' => 'required',
            'centre' => 'required',
            'date' => 'required|date',
            'heure' => 'required'
        ]);

        $rendezvous->update($request->all());
        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous mis à jour.');
    }

    public function destroy(Rendezvous $rendezvous)
    {
        $rendezvous->delete();
        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous supprimé.');
    }
}

