<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Precommande;

class PrecommandeWebController extends Controller
{
    public function type(Request $request)
    {
        return view('precommande.type');
    }

    public function step1(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'date_naissance' => 'required|date',
                'lieu_naissance' => 'required',
                'ville' => 'required',
                'email' => 'required|email',
                'telephone' => 'required',
                'adresse' => 'required',
            ]);
            Session::put('precommande.step1', $data);
            return redirect()->route('precommande.step2');
        }
        return view('precommande.step1');
    }

    public function step2(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'nom_pere' => 'required',
                'prenom_pere' => 'required',
                'nom_mere' => 'required',
                'prenom_mere' => 'required',
            ]);
            Session::put('precommande.step2', $data);
            return redirect()->route('precommande.step3');
        }
        return view('precommande.step2');
    }

    public function step3(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'nom_gp_paternel' => 'required',
                'prenom_gp_paternel' => 'required',
                'nom_gm_paternel' => 'required',
                'prenom_gm_paternel' => 'required',
                'nom_gp_maternel' => 'required',
                'prenom_gp_maternel' => 'required',
                'nom_gm_maternel' => 'required',
                'prenom_gm_maternel' => 'required',
            ]);
            Session::put('precommande.step3', $data);
            return redirect()->route('precommande.step4');
        }
        return view('precommande.step3');
    }

    public function step4(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'centre_id' => 'required|exists:centres,id',
                'creneau_id' => 'required|exists:creneau,id',
            ]);
            Session::put('precommande.step4', $data);
            return redirect()->route('precommande.recap');
        }
        return view('precommande.step4');
    }

    public function recap(Request $request)
    {
        $data = array_merge(
            Session::get('precommande.step1', []),
            Session::get('precommande.step2', []),
            Session::get('precommande.step3', []),
            Session::get('precommande.step4', [])
        );

        if ($request->isMethod('post')) {
            // S'assurer que 'ville' est bien présent
            if (!isset($data['ville'])) {
                $data['ville'] = Session::get('precommande.step1.ville', '');
            }
            // Générer un code de suivi unique
            $code_suivi = strtoupper(\Illuminate\Support\Str::random(8));
            while (\App\Models\Precommande::where('code_suivi', $code_suivi)->exists()) {
                $code_suivi = strtoupper(\Illuminate\Support\Str::random(8));
            }
            $data['code_suivi'] = $code_suivi;
            $data['statut'] = 'en_attente';
            // Enregistrement
            $precommande = \App\Models\Precommande::create($data);
            // Notifier l'admin
            \Notification::route('mail', 'admin@cni.ma')
                ->notify(new \App\Notifications\NouvellePrecommande($precommande));
            // Nettoyer la session
            Session::forget('precommande');
            return view('precommande.confirmation', ['code_suivi' => $code_suivi]);
        }
        return view('precommande.recap', compact('data'));
    }

    public function suivi(Request $request)
    {
        $precommande = null;
        if ($request->has('code_suivi')) {
            $precommande = Precommande::where('code_suivi', $request->input('code_suivi'))->first();
        }
        return view('precommande.suivi', compact('precommande'));
    }
}
