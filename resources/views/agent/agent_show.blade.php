
@extends('layouts.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class=" btn-sm card-body ">
                    <div class="row">
                        <div class="col-7">
                            <img style="height:360px;" src="{{asset('storage').'/'.$user->photo}}" class="w-100 h-65 " alt="preuve-recu">
                        </div>
                        <div class="col-5 ">
                            <div class="list-group mt-1">  
                                <div class="list-item text-bold row"><span class="col-6 text-bold" >Nom: </span><span class="text-info font-weight-bold">{{$user->name}}   </div><br>
                                <div class="list-item text-bold  row"><span class="col-6 text-bold" >Prénom (s): </span><span class="text-info font-weight-bold">{{$user->prenom}}   </div><br>
                                <div class="list-item text-bold row"><span class="col-6 text-bold" >Sexe: </span><span class="text-info font-weight-bold">{{$user->sexe}}   </div><br>
                                <div class="list-item text-bold row"><span class=" col-6 text-bold" >Date de naissance : </span><span class="text-info font-weight-bold"> {{$user->dat_naiss}}  </div><br>
                                <div class="list-item text-bold row"><span class="col-6 text-bold">Lieu de résidence:</span> <span class="text-info font-weight-bold">{{$user->residence }} </span> </div><br>
                                <div class="list-item text-bold row"><span class="col-6 text-bold">Contact:</span><span class="text-info font-weight-bold"> {{$user->contact}} </span></div><br>
                                <div class="list-item text-bold row"><span class="col-6 text-bold">Durée du contrat: </span> <span class="text-info font-weight-bold">{{$user->contrat}}</span>  </div><br>
                                <div class="list-item text-bold row"><span class="col-6 text-bold">Début de fonction: </span> <span class="text-info font-weight-bold">{{$user->debut_fonction}} </span> </div><br>
                                <div class="form-group d-flex float-right col-auto">
                                    <a  class="btn btn-warning ml-2 " href="{{route('pole.show', $pole)}}">{{ __('Fermer') }}</a> 
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
