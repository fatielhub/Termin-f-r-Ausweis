<?php

namespace App\Http\Controllers;

use App\Models\Precommande;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PrecommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Precommande::with(['centre', 'creneau', 'documents'])->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_demande' => ['required', Rule::in(['nouvelle', 'renouvellement'])],
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'cin' => 'nullable|string|max:20',
            'nom_pere' => 'required|string|max:255',
            'nom_mere' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'centre_id' => 'required|exists:centres,id',
            'creneau_id' => 'required|exists:creneau,id',
        ]);

        // Générer un code de suivi unique
        $code_suivi = strtoupper(Str::random(8));
        while (Precommande::where('code_suivi', $code_suivi)->exists()) {
            $code_suivi = strtoupper(Str::random(8));
        }

        $precommande = Precommande::create(array_merge($validated, [
            'code_suivi' => $code_suivi,
            'statut' => 'en_attente',
        ]));

        // (Optionnel) Gérer l'upload de documents ici

        return response()->json([
            'message' => 'Précommande enregistrée avec succès',
            'code_suivi' => $precommande->code_suivi,
            'precommande' => $precommande->load(['centre', 'creneau', 'documents'])
        ], 201);
    }

    /**
     * Display the specified resource (by code de suivi).
     */
    public function show(string $code_suivi)
    {
        $precommande = Precommande::where('code_suivi', $code_suivi)->with(['centre', 'creneau', 'documents'])->firstOrFail();
        return response()->json($precommande);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
