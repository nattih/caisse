<?php

namespace App\Http\Controllers;

use App\Bilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $bilan;
    public function __construct()
    {
        $this->middleware('auth');
        $this->bilan = Bilan::select('solde', 'etat')->first();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $statutBilan= $this->bilan;
        Session::put('statutBilan', $this->bilan->etat);
        return view('home');
    }
}
