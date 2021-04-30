<?php
namespace App\Http\Controllers;
use App\User;
use App\Bilan;
use App\Compte;
use App\Depense;
use App\TypeDepense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DepenseController extends Controller
{
    // les operation sur les types de depenses
    public $bilan;
    public function __construct()
    {
        $this->middleware('auth');
        $this->bilan = Bilan::select('solde', 'etat')->first();
    }

    public function index()
    {
         $typeDepenses=TypeDepense::paginate(3);
        return view('depense.index', compact('typeDepenses'));
    }

    public function create_type_depense()
    {
        return view('depense.tdform');
    }
    public function store_type_depense(Request $request)
    {
        request()->validate([
            'code'=> ['required','string'],
            'description'=> ['required','string'],
          ]);
        TypeDepense::create($request->all());
        return redirect()->route('depense');
    }

    public function destroy_type_depense(TypeDepense $typeDepense)
    {
        $typeDepense->delete();
        return back();
    }
    public function show_type_depense($typeDepense)
    {
        $nombres=Depense::where('statut','!=' , 1)->get();
        $dep=Depense::where('type_depense_id', '=', $typeDepense)->where('statut', 1)->get();
        $depenses=Depense::where('type_depense_id', '=', $typeDepense)->where('statut', 1)->paginate(6);
        $totalDep = $dep->sum('montant');
        return view('depense.type_show',compact('depenses','totalDep', 'nombres', 'typeDepense'));
    }
    public function update_type_depense(Request $request , TypeDepense $typeDepense)
    {
        $typeDepense->update($request->all());
        return redirect()->back();
    }

// les operation sur les depenses

public function create_depense()
    { 
        // $bilan = Bilan::select('solde')->first();
        $statutBilan = $this->bilan;
        $agents=User::where('id','!=' , 1)->where('statut',1)->get();
        $tds=TypeDepense::all();
        if ($statutBilan->etat == 0) {
            Session::flash('message', 'Veuilez ouvrir la caisse d\'abord!');
            Session::flash('alert-class', 'alert-danger text-center'); 
            return redirect()->back();
        } else {
            return view('depense.dform', compact('tds', 'agents', 'statutBilan'));
        }
    }
    public function store_depense(Request $request)
    {
        $data= request()->validate([
            'date_depense'=> ['required','date'],
            'type_depense_id'=> ['required','integer'],
            'agent'=> ['required','integer'],
            'montant'=> ['required','numeric'],
            'description'=> ['required','string'],
            'fournisseur'=> ['required','string'],
            'commentaire'=> ['required','string'],
            'fichier'=> ['required','image'],
          ]);
          $imagePath=request('fichier')->store('uploads','public');
          $compteId = Compte::where('statut', 1)->select('id')->first();
          $soldeCaisse = Bilan::where('etat', 1)->first();
          if ($soldeCaisse->solde  > $data['montant']){
            $newSolde = $soldeCaisse->solde - $data['montant'];
            Depense::create([
                'date_depense'=>$request->date_depense,
                'user_id'=> Auth::user()->id,
                'compte_id'=>$compteId->id,
                'type_depense_id'=>$request->type_depense_id,
                'agent'=>$request->agent,
                'montant'=>$request->montant,
                'nouveau_solde' => $newSolde,
                'description'=>$request->description,
                'fournisseur'=>$request->fournisseur,
                'commentaire'=>$request->commentaire,
                'fichier'=>$imagePath,
            ]); 
            DB::table('bilans')->update(['solde' => $newSolde]);
          }else{
            Session::flash('message', 'Désolé!, le solde disponible est insuffisant pour éffectuer cette depense');
            Session::flash('alert-class', 'alert-danger text-center'); 
            return redirect()->back();
        }

        return redirect()->route('d.list');
    }

    public function list_depense()
    { 
        // $statutCaisse = $this->statutCaisse;
        $nombres=Depense::where('statut','!=' , 1)->get();
        $dep=Depense::where('statut', 1)->get();
         $depenses=Depense::latest()->where('statut', 1)->paginate(4);
         $totalDep = $dep->sum('montant');
        return view('depense.list', compact('depenses', 'totalDep','nombres'));
        
    }

    public function list_depense_invalid()
    { 
        // $statutCaisse = $this->statutCaisse;
        $agents=User::where('id','!=' , 1)->get();
        $tds=TypeDepense::all();
        $dep=Depense::where('statut','!=' , 1)->get();
         $depenses=Depense::where('statut','!=' , 1)->latest()->paginate(4);
         $totalDep = $dep->sum('montant');
        return view('depense.invalid', compact('depenses', 'totalDep', 'tds', 'agents'));
        
    }

    public function destroy_depense(Depense $depense)
    {
        $depense->delete();
        return back();
    }
    public function show_depense(Depense $depense)
    {
        return view('depense.detail', compact('depense'));
    }

    public function etat_show_depense( TypeDepense $typeDepense, Depense $depense)
    {
        return view('depense.etat_detail', compact('depense','typeDepense'));
    }
    public function show_depense_invalid(Depense $depense)
    {
        return view('depense.invalid_detail', compact('depense'));
    }
    
    public function edit_depense(Depense $depense)
    {
        $agents=User::where('id','!=' , 1)->where('statut',1)->get();
        $tds=TypeDepense::all();
        return view('depense.edit', compact('depense','tds', 'agents'));
    }

    
    public function update_depense(Request $request, Depense $depense)
    {
        $data=request()->validate([
            'type_depense_id'=> ['required','integer'],
            'date_depense'=> ['required','date'],
            'agent'=> ['required','integer'],
            'montant'=> ['required','numeric'],
            'description'=> ['required','string'],
            'fournisseur'=> ['required','string'],
            'commentaire'=> ['required','string'],
          ]);
        if(request('fichier')){
            $imagePath=request('fichier')->store('uploads','public');
            $depense->update(array_merge($data,['fichier'=>$imagePath]));
          }
          else{
            $depense->type_depense_id=$request->type_depense_id;
            $depense->date_depense=$request->date_depense; 
            $depense->agent=$request->agent;
            $depense->montant=$request->montant;
            $depense->description=$request->description;
            $depense->fournisseur=$request->fournisseur;
            $depense->commentaire=$request->commentaire;
            $depense->save();
          }
          return redirect()->route('invalid_dep.show',$depense);
    }

    // Validation et rejet des depenses

    public function validate_depense($id)
    {
        Depense::where('id', $id)->update(['statut' =>1]);

        return redirect()->back();
    }
    
    public function rejet_depense($id)
    {
        $statutBilan = $this->bilan;
        $depense = Depense::find($id);
        $newSolde = $statutBilan->solde + $depense->montant;
        Depense::where('id', $id)->update(['statut' => 2]);
        DB::table('bilans')->update(['solde' => $newSolde]);
        return redirect()->back();
    }
}
