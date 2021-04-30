<?php

namespace App\Http\Controllers;

use App\Pole;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
         $roles=Role::all();
        $users= User::latest()->where('id', '!=', 1)
                            ->where('statut', 1)->paginate(5);
        return view('agent.index', compact('users', 'roles'));
    }
    public function archive_agent()
    {
        $roles=Role::all();
        $users= User::latest()->where('statut', 0)->paginate(5);
        return view('agent.archive', compact('users', 'roles'));
    }

    public function user_store(){
    $data=request()->validate([
        'name' => ['required', 'string', 'max:255'],
        'prenom' => ['required', 'string', 'max:255'],
        'sexe' => ['required', 'integer'],
        'dat_naiss' => ['required', 'string'],
        'residence' => ['required', 'string'],
        'contact' => ['required', 'string', 'max:8'],
        'pole_id' => ['required', 'integer'],
        'debut_fonction' => ['required', 'string'],
        'contrat' => ['required', 'string'],
        'photo' => ['required', 'image'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
      ]);
      $imagePath=request('photo')->store('uploads','public');
      $user=User::create([
        'name' => $data['name'],
        'prenom' => $data['prenom'],
        'sexe' => $data['sexe'],
        'dat_naiss' => $data['dat_naiss'],
        'residence' => $data['residence'],
        'contact' => $data['contact'],
        'pole_id' => $data['pole_id'],
        'debut_fonction' => $data['debut_fonction'],
        'contrat' => $data['contrat'],
        'photo' => $imagePath,
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    $role = Role::select('id')->where('name', 'agent')->first();
    $user->roles()->attach($role);
        Session::flash('message', 'Agent enregistré avec succes!'); 
        Session::flash('alert-class', 'alert-success text-center'); 
        return redirect()->back();
}

    public function profil()
    {
        $user=\auth()->user();
    
        return view('agent.profil',compact('user'));
    }

    public function image_update(){
        $user=\auth()->user();
        
        if(request('photo')){
            $imagePath=request('photo')->store('uploads','public');
            $user->photo=$imagePath;
          }
        $user->save();
        
        return back();
    }

    public function password(){
        $user=\auth()->user();
        $user->password=bcrypt(request('password'));
        $user->save();
        return back();
    }

    public function destroy(User $user)
    {
        // $user->roles()->detach();
        $user->statut = 0;
        $user->save();
        return back();
    }

    public function activer_user(User $user)
    {
        // $user->roles()->detach();
        $user->statut = 1;
        $user->save();
        return back();
    }

    public function edit(User $user)
    {
    //      $roles=Role::all();
    //     return view('modal.agent', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->salaire=$request->salaire;
        $user->save();
        return redirect()->route('agent');
    }

    public function update_agent(Request $request, User $user)
    {
        $user->name=$request->name;
        $user->prenom=$request->prenom;
        $user->residence=$request->residence;
        $user->contact=$request->contact;
        $user->contrat=$request->contrat;
        $user->email=$request->email;
        $user->pole_id=$request->pole_id;
        $user->save();
        return redirect()->back();
    }

    public function user_show(Pole $pole , User $user){

        return view('agent.agent_show',compact('pole', 'user'));
    }
}
