<?php

namespace App\Http\Controllers;
use App\User;
use App\Bilan;
use App\Compte;
use App\Recette;
use App\TypeRecette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RecetteController extends Controller
{
    public $bilan;
    public function __construct()
    {
        $this->middleware('auth');
        $this->bilan = Bilan::select('solde', 'etat')->first();
    }
    
    public function index()
    {
        $trs=TypeRecette::paginate(3);
        return view('recette.index', compact('trs'));
    }
    public function create_type_recette()
    {
        return view('recette.trform');
    }

    public function store_type_recette(Request $request)
    {
        request()->validate([
            'code'=> ['required','string'],
            'appro'=> ['required','string'],
          ]);
        TypeRecette::create($request->all());
        return redirect()->route('recette');
    }

    public function destroy_type_recette(TypeRecette $tr)
    {
        $tr->delete();
        return back();
    }
    public function show_type_recette($tr)
    {
        $nombres=Recette::where('statut', '!=', 1)->get();
        $recet=Recette::where('type_recette_id', '=', $tr)->where('statut', 1)->get();
        $recettes=Recette::latest()->where('type_recette_id', '=', $tr)->where('statut', 1)->paginate(6);
        $totalRecet = $recet->sum('montant');
        return view('recette.type_show',compact('recettes', 'nombres', 'totalRecet'));
    }

    public function update_type_recette(Request $request , TypeRecette $tr)
    {
        $tr->update($request->all());
        return redirect()->back();
    }

    public function create_recette()
    {
        $bilan = Bilan::select('solde')->first();
        $actuelSolde = $bilan->solde;
        $statutBilan = $this->bilan;
        $trs=TypeRecette::all();
        $recette=new Recette();
        if ($statutBilan->etat == 0) {
            Session::flash('message', 'Veuilez ouvrir la caisse d\'abord!');
            Session::flash('alert-class', 'alert-danger text-center');
            return redirect()->back();
        } else {
            return view('recette.rform', compact('trs', 'recette', 'statutBilan', 'actuelSolde'));
        }
    }
    public function store_recette(Request $request)
    {
        $data= request()->validate([
            'date_recette'=> ['required','date'],
            'libelle'=> ['required','string'],
            'type_recette_id'=> ['required','integer'],
            'montant'=> ['required','numeric'],
            'source'=> ['required','integer'],
          ]);
        $compteId = Compte::where('statut', 1)->select('id')->first();
        Recette::create([
            'date_recette'=>$request->date_recette,
            'libelle'=>$request->libelle,
            'user_id'=> Auth::user()->id,
            'compte_id'=>$compteId->id,
            'type_recette_id'=>$request->type_recette_id,
            'montant'=>$request->montant,
            'nouveau_solde'=>$request->nouveau_solde,
            'source'=>$request->source,
        ]);
        $bilan = Bilan::where('etat', 1)->first();
        $newSolde = $data['montant'] + $bilan->solde;
        DB::table('bilans')->update(['solde'=> $newSolde]);
        Session::flash('message', 'Caisse approvisionnée avec succès!');
        Session::flash('alert-class', 'alert-success text-center');
        return redirect()->route('r.list');
    }
    public function list_recette(Recette $recette)
    {
        $nombres=Recette::where('statut', '!=', 1)->get();
        $recettes=Recette::latest()->where('statut', 1)->paginate(5);
        return view('recette.list', compact('recettes', 'nombres'));
    }

    public function destroy_recette(Recette $recette)
    {
        $recette->delete();
        return back();
    }

    // public function edit_recette(Recette $recette)
    // {   
    //     // $user=User::all();
    // //     $trs=TypeRecette::all();
    // //     return view('recette.edit', compact('recette', 'trs', 'user'));
    // }
    
    public function update_recette(Request $request, Recette $recette)
    {
        request()->validate([
            'date_recette'=> ['required','date'],
            'libelle'=> ['required','string'],
            'type_recette_id'=> ['required','integer'],
            'montant'=> ['required','numeric'],
            'source'=> ['required','integer'],
          ]);
          $recette->date_recette=$request->date_recette;
          $recette->type_recette_id=$request->type_recette_id;
          $recette->libelle=$request->libelle;
          $recette->montant=$request->montant;
          $recette->source=$request->source;
          $recette->save();
          return redirect()->route('invalid.show',$recette);
    }

    public function list_recette_invalid(Recette $recette)
    {
        $trs=TypeRecette::all();
        $recettes=Recette::where('statut', '!=', 1)->latest()->paginate(5);
        return view('recette.invalid', compact('recettes', 'trs'));
    }

    public function validate_recette($id)
    {
        Recette::where('id', $id)->update(['statut' =>1]);

        return redirect()->back();
    }

    public function rejet_recette($id)
    {
        $statutBilan = $this->bilan;
        $appro = Recette::find($id);
        $newSolde = $statutBilan->solde - $appro->montant;
        Recette::where('id', $id)->update(['statut' => 2]);
        DB::table('bilans')->update(['solde' => $newSolde]);
        return redirect()->back();
    }

    public function show_recette_invalid(Recette $recette)
    {
        return view('recette.invalid_detail', compact('recette'));
    }
}