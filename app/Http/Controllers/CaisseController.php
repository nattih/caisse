<?php

namespace App\Http\Controllers;

use App\Pole;
use App\User;
use App\Bilan;
use App\Compte;
use App\Depense;
use App\Recette;
use App\TypeDepense;
use App\TypeRecette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CaisseController extends Controller
{
    public $bilan;
    public function __construct()
    {
        $this->middleware('auth');
        $this->bilan = Bilan::select('solde', 'etat')->first();
    }

    public function compte()
    {
        $bilan = Bilan::select('solde')->first();
        $actuelSolde = $bilan->solde;
        $statutBilan = $this->bilan;
        if ($statutBilan->etat == 1) {
            Session::flash('message', 'La caisse est dejà ouverte!');
            Session::flash('alert-class', 'alert-danger text-center');
            return redirect()->back();
        } else {
            return view(' caisse.compte.ouverture', compact('statutBilan', 'actuelSolde'));
        }
    }
    public function ouvertureCompte(Request $request)
    {
        $data = $request->validate([
            'date_ouverture' => ['required', 'date'],
            'solde_ouverture' => ['required', 'numeric'],
        ]);
        Compte::create([
            'user_id' => Auth::user()->id,
            'bilan_id' => 1,
            'solde_ouverture' => $data['solde_ouverture'],
            'date_ouverture' => $data['date_ouverture']
        ]);
        DB::table('bilans')->update(['solde' => $data['solde_ouverture'], 'etat' => 1]);
        Session::flash('message', 'Caisse ouverte avec succès!');
        Session::flash('alert-class', 'alert-success text-center'); 
        return redirect()->route('home');
    }


    public function fermeture()
    {
        $statutBilan = $this->bilan;
        $dateSoldeOuv = Compte::where('statut', 1)
                                ->where('actif', 1)
                                ->select('date_ouverture', 'solde_ouverture')->first();
        $approvs = DB::table('recettes')->join('comptes', 'recettes.compte_id', 'comptes.id')
                                ->select('comptes.statut', 'recettes.montant', 'recettes.statut')
                                ->where('recettes.statut', 1)
                                ->where('actif', 1)
                                ->where('comptes.statut', 1)->get();
        $totalApprov = $approvs->sum('montant');

        $deps = DB::table('depenses')->join('comptes', 'depenses.compte_id', 'comptes.id')
                                                ->select('comptes.statut', 'depenses.montant', 'depenses.statut')
                                                ->where('depenses.statut', 1)
                                                ->where('actif', 1)
                                                ->where('comptes.statut', 1)->get();
            if ($statutBilan->etat == 0) {
                Session::flash('message', 'La caisse est dejà fermée!');
                Session::flash('alert-class', 'alert-danger text-center');
                 return redirect()->back();
            } else {
        $totalDep = $deps->sum('montant');
        $soldeTheo = ($totalApprov + $dateSoldeOuv->solde_ouverture) - $totalDep;

            return view('caisse.compte.fermeture', compact('dateSoldeOuv', 'totalApprov', 'totalDep', 
                                                            'soldeTheo','statutBilan'));
        }
    }

    public function fermer_compte(Request $request)
    {
        $data = $request->validate([
            'date_fermeture' => ['required', 'date'],
            'solde_fermeture' => ['required', 'numeric'],
            'total_recette' => ['required', 'numeric'],
            'total_depense' => ['required', 'numeric'],
            'solde_theorique' => ['required', 'numeric'],
            'solde_physique' => ['required', 'numeric'],
            'ecart' => ['required', 'numeric'],
        ]);
        Compte::where('statut', 1)->update([
            'date_fermeture' => $data['date_fermeture'],
            'solde_fermeture' => $data['solde_fermeture'],
            'total_recette' => $data['total_recette'],
            'total_depense' => $data['total_depense'],
            'solde_theorique' => $data['solde_theorique'],
            'solde_physique' => $data['solde_physique'],
            'ecart' => $data['ecart'],
            'actif' => 0,
            'statut' => 0
        ]);
        DB::table('bilans')->update(['solde' => $data['solde_fermeture'], 'etat' => 0]);
        Session::flash('message', 'Caisse fermée avec succès!');
        Session::flash('alert-class', 'alert-success text-center'); 
        return redirect()->route('home');
    }

    public function etat_caisse(){
        $dep=Depense::where('statut', 1)->get();
        $totalDep = $dep->sum('montant');
        $appro=Recette::where('statut', 1)->get();
        $totalAppro = $appro->sum('montant');
        $solde= $totalAppro-$totalDep;
        $typeDepenses=TypeDepense::all();
        $trs=TypeRecette::all();
        $poles = Pole::all();
        $agents=User::where('id', '!=', 1)->where('statut',1)->get();
        return view('caisse.bilan.etat', compact('typeDepenses','trs', 'poles', 'totalDep', 'totalAppro', 'solde', 'agents'));
    }
    
}
