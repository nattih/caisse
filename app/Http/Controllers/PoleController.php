<?php

namespace App\Http\Controllers;

use App\Pole;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class PoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poles = Pole::latest()->paginate(3);
        return view('agent.pole', compact('poles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'code'=> ['required','string'],
            'nom'=> ['required','string'],
          ]);
            Pole::create($request->all());
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pole  $pole
     * @return \Illuminate\Http\Response
     */
    public function show($pole)
    {
        $poles=Pole::all();
        $roles=Role::all();
        $users=User::latest()->where('pole_id', '=', $pole)->where('id','!=' , 1)->where('statut',1)->paginate(3);
        return view('agent.pole_show',compact('users', 'roles', 'poles', 'pole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pole  $pole
     * @return \Illuminate\Http\Response
     */
    public function edit(Pole $pole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pole  $pole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pole $pole)
    {
        request()->validate([
            'code'=> ['required','string'],
            'nom'=> ['required','string'],
          ]);
        $pole->update($request->all());
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pole  $pole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pole $pole)
    {
        $pole->delete();
        return back();
    }
}
