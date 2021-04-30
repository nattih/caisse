@extends('layouts.menu')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header text-center font-weight-bold">{{ __('Approvisionnement' ) }}</div>
          <div class="card-body">
            <form action="{{route('r.store')}}" method="post" id="recette_form">
                @csrf
              <div class="d-flex d-flex justify-content-between form-row">
                <div class="gauche col">
                  <fieldset>
                    <legend class="btn-sm text-center"> <i class="text-info fas fa-plus-circle"></i> Ajouter</legend>
                    <div class="form-group col">
                      <label class="font-weight-bold">Libellé :</label>
                      <input type="text" id="libelle" class="form-control @error('libelle') is-invalid @enderror"  name="libelle" placeholder="" value="{{ old('libelle') }}">
                        @error('libelle')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                      <label class="font-weight-bold">Nature :</label>
                      <select id="type_recette_id" id="type_recette_id" class="form-control custom-select @error('type_recette_id') is-invalid @enderror" type="number" name="type_recette_id" placeholder="" value="{{ old('type_recette_id') }}">
                        <option> Chosir le type de recette</option>
                        @foreach($trs as $tr)  
                        <option value="{{$tr->id}}">{{$tr->appro}}</option>
                      @endforeach
                      </select>
                        @error('type_recette_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label class="font-weight-bold">Date d'acquisition :</label>
                        <input type="date" id="date_recette'" class="form-control @error('date_recette') is-invalid @enderror" type="text" name="date_recette" placeholder="" value="{{ old('date_recette') }}">
                          @error('date_recette')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                    </div>
                    <div class="form-group col">
                      <label class="font-weight-bold">Source :</label>
                      <select id="source" class="form-control custom-select @error('source') is-invalid @enderror" type="text" name="source" placeholder="" value="{{ old('source') }}">
                        <option> Chosir le type de recette</option>
                        @foreach ($recette->getSourceOptions() as $key=>$value)
                        <option value="{{$key}}"> {{$value}}</option>
                      @endforeach
                      </select>
                        @error('source')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                      <label class="font-weight-bold">Montant :</label>
                      <input type="number" id="montant" class="form-control @error('montant') is-invalid @enderror" name="montant" placeholder="" value="{{ old('montant') }}">
                        @error('montant')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div> 
                  </fieldset>
                </div>
                <div class="droite col">
                  <fieldset>
                    <legend class="btn-sm text-center">Etat de la liquidité</legend>
                    <div class="form-group col">
                      <label class="font-weight-bold">Solde Actuel :</label>
                      <input type="number" id="solde_ouverture" class="font-weight-bold  form-control @error('solde_ouverture') is-invalid @enderror" id="solde_ouverture" name="solde_ouverture" placeholder="" value="{{$actuelSolde}}" readonly>
                        @error('solde_ouverture')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                      <label class="font-weight-bold">Auteur :</label>
                      <input type="text" id="user_id" class="font-weight-bold  form-control @error('user_id') is-invalid @enderror" name="user_id" placeholder="" value="{{ __(auth()->user()->name)}} {{ __(auth()->user()->prenom)}}" readonly>
                        @error('user_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                      <label class="font-weight-bold"> Nouveau solde :</label>
                      <input type="number" id="nouveau_solde" class="font-weight-bold form-control @error('nouveau_solde') is-invalid @enderror"  name="nouveau_solde" placeholder="" value="{{old('nouveau_solde')}}" readonly>
                        @error('nouveau_solde')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div> <br><br><br>
                    <div class="form-group   col-auto mt-5">
                      <button type="submit" class="btn btn-info ">Ajouter</button>
                      <button type="reset" class="btn btn-dark ml-2  ">Annuler</button>
                      <a  class="btn btn-warning ml-2 " href="{{route('home')}}">{{ __('Fermer') }}</a> 
                    </div>
                  </fieldset>
                </div>
              </div>     
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#recette_form").length > 0) {
            // $("#recette_form").validate({
        
                // rules: {
                //     date_recette: {
                //         required: true,
                //     },
                
                //     solde_ouverture: {
                //         required: true,
                //         number: true,
                //     },

                //     montant: {
                //         required: true,
                //         number: true,
                //     },

                //     source: {
                //         required: true,
                //         number: true,
                //     },

                //     nouveau_solde: {
                //         required: true,
                //         number: true,
                //     },

                //     type_recette_id: {
                //         required: true,
                //         number: true,
                //     },
                // },
                // messages: {
        
                //     date_recette: {
                //         required: "Vous devez saisir la date de l'approvisionnement",
                //     },
                
                //     solde_ouverture: {
                //         required: "Vous devez saisir le solde à l'ouverture",
                //         number: "Le solde à l'ouverture doit être un mombre valide",
                //     },

                //     montant: {
                //         required: "Vous devez saisir le montant de l'approvisionnement",
                //         number: "Le montant de l'approvisionnement doit être un nombre valide",
                //     },

                //     source: {
                //         required: "Vous devez choisir la source de l'approvisionnementt",
                //         number:"La source d'approvisionnement doit être un nombre valide",
                //     },

                //     nouveau_solde: {
                //         required: "Vous devez saisir le nouveau solde",
                //         number:"Le nouveau solde doit être un nombre valide"
                //     },

                //     type_recette_id: {
                //         required: "Vous devez choisir le type d'approvisionnement",
                //         number:"Le type d'approvisionnement doit être un nombre valide"
                //     },
                    
                // },
            // });
        } 
        $('#montant').change(function(){
            var montant = $(this).val()
            var soldeOuv = $('#solde_ouverture').val()
            var newSolde = Number(montant) + Number(soldeOuv)
            $('#nouveau_solde').val(newSolde)
        });
    });
</script>
@endsection