
@extends('layouts.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="text-center">
                    <h2>Depense : {{$depense->description}}</h2>
                  </div>
                <div class="  card-body ">
                    <div class="row">
                        <div class="col-7">
                            <img style="height:360px;" src="{{asset('storage').'/'.$depense->fichier}}" class="w-100 h-65 " alt="preuve-recu">
                        </div>
                        <div class="col-5 ">
                            <div class="list-group mt-1">  
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6" >Nature : </span><span > {{$depense->typeDepense->description}} </div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Effectée le:</span> {{$depense->date_depense }}  </div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Montant:</span> <span class="text-danger font-weight-bold ">{{number_format($depense->montant, 2, ',', ' ') }} f CFA</span></div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Fourniseur: </span> {{$depense->fournisseur}}  </div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Commentaire: </span>  {{$depense->commentaire}} </div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Enregistré le: </span>  {{$depense->created_at->format('d/m/y à H:m')}}</div><br>
                                <div class="list-item text-bold row"><span class="font-weight-bold col-6">Par </span>  {{$depense->user->name}} {{$depense->user->prenom}} </div><br>
                                <div class="form-group d-flex float-right col-auto">
                                    <a  class="btn btn-warning ml-2 " href="{{route('d.list')}}">{{ __('Fermer') }}</a> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
