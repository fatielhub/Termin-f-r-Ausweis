<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Precommande;
use Illuminate\Http\Request;

class PrecommandeAdminController extends Controller
{
    public function index()
    {
        $precommandes = Precommande::with(['centre', 'creneau'])->orderByDesc('created_at')->paginate(20);
        return view('admin.precommandes.index', compact('precommandes'));
    }

    public function show($id)
    {
        $precommande = Precommande::with(['centre', 'creneau'])->findOrFail($id);
        return view('admin.precommandes.show', compact('precommande'));
    }

    public function update(Request $request, $id)
    {
        $precommande = Precommande::findOrFail($id);
        $request->validate([
            'statut' => 'required|in:en_attente,validee,rejetee,annulee',
        ]);
        $precommande->statut = $request->statut;
        $precommande->save();
        return redirect()->route('admin.precommandes.show', $precommande)->with('success', 'Statut mis à jour.');
    }
    // Les autres méthodes (show, edit, update, destroy) peuvent être ajoutées selon besoin
} 