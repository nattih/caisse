
@extends('layouts.menu')
@section('content')
<div class="container">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
   @endif
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="text-center">
                    <h2>Appro : {{$recette->libelle}}</h2>
                  </div>
                <div class=" card-body d-flex justify-content-center ">
                            <div class="list-group mt-1">  
                                <div class="list-item text-bold row"><span class=" col-6 font-weight-bold" >Statut : </span> <span class=" col-6"> @switch($recette->statut)
                                    @case(0) En cours...@break @case(1) Validée @break @default  Rejetée @endswitch </span>
                                 </div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Effectée le:</span> <span class=" col-6">{{$recette->date_recette}} </span></div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Montant: </span> <span class="font-weight-bold text-success col-6"> {{number_format($recette->montant, 2, ',', ' ') }} f CFA</span></div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Source:</span> <span class=" col-6"> {{$recette->source}} </span></div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Enregistré le: </span> <span class=" col-6"> {{$recette->created_at->format('d/m/y à H:m')}}</span></div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Auteur: </span> <span class=" col-6"> {{$recette->user->name}} {{$recette->user->prenom}} </span></div><br>
                                <div class="form-group d-flex float-right ">
                                    @can('manage-users')
                                    <a class="btn btn-success"  href="{{route('recette.validate', $recette->id)}}"> Valider</a>
                                    <a class="btn btn-danger ml-2"  href="{{route('recette.rejeter', $recette->id)}}">Rejeter</a>
                                    @endcan
                                    <a  class="btn btn-warning ml-2 " href="{{route('r.list')}}">{{ __('Fermer') }}</a> 
                                </div> 
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
