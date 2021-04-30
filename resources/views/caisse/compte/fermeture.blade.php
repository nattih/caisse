@extends('layouts.menu')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header text-center">{{ __('Fermeture de la caisse' ) }}</div>
          <div class="card-body">
            <form action="{{route('compte.fermer')}}" method="post" id="fermeture_form">
                        @csrf
              <div class="d-flex d-flex justify-content-between form-row">
                <div class="gauche col">
                    <div class="form-group col">
                      <label>Date d'ouverture</label>
                      <input type="date" id="date_ouverture" class="font-weight-bold form-control @error('date_ouverture') is-invalid @enderror"  name="date_ouverture" placeholder="" 
                      value="{{ $dateSoldeOuv->date_ouverture}}" readonly>
                        @error('date_ouverture')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Date de fermeture</label>
                        <input type="date" id="date_fermeture" class="form-control text-danger font-weight-bold @error('date_fermeture') is-invalid @enderror" name="date_fermeture" placeholder="" value="<?php echo date('Y-m-d'); ?>">
                          @error('date_fermeture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                    </div>
                    <div class="form-group col">
                      <label>Approvissionnement</label>
                      <input type="number"  id="total_recette" class=" font-weight-bold form-control @error('total_recette') is-invalid @enderror" name="total_recette" placeholder=""
                       value="{{$totalApprov}}" readonly>
                        @error('total_recette')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div> 
                    <div class="form-group col">
                        <label> Solde physique</label>
                        <input type="number"  id="solde_physique" class="form-control @error('solde_physique') is-invalid @enderror"  name="solde_physique" placeholder="" 
                        value="{{old('solde_physique')}}">
                          @error('solde_physique')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>  
                      <div class="form-group   col-auto mt-5">
                        <button type="submit" class="btn btn-info ">Fermer</button>
                        <a  class="btn btn-warning ml-2 " href="{{route('home')}}">{{ __('Annuler') }}</a> 
                      </div>
                </div>
                <div class="droite col">
                    <div class="form-group col">
                      <label>Solde ouverture</label>
                      <input type="number"  id="solde_ouverture" class="font-weight-bold form-control @error('solde_ouverture') is-invalid @enderror" id="solde_ouverture" name="solde_ouverture" placeholder="" 
                        value="{{$dateSoldeOuv->solde_ouverture}}" readonly>
                        @error('solde_ouverture')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                      <label> Solde fermeture</label>
                      <input type="number" id="solde_fermeture" class="font-weight-bold form-control @error('solde_fermeture') is-invalid @enderror"  name="solde_fermeture" placeholder="" 
                      value="{{$soldeTheo}}" readonly>
                        @error('solde_fermeture')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>  
                    <div class="form-group col">
                        <label> Depenses réalisées</label>
                        <input type="number" id="total_depense" class="font-weight-bold form-control @error('total_depense') is-invalid @enderror"  name="total_depense" placeholder="" 
                        value="{{$totalDep}}" readonly>
                          @error('total_depense')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>  
                      <div class="form-group col">
                        <label> Solde theorique</label>
                        <input type="number" id="solde_theorique" class="font-weight-bold form-control @error('solde_theorique') is-invalid @enderror"  name="solde_theorique" placeholder="" 
                        value="{{$soldeTheo}}" readonly>
                          @error('solde_theorique')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>  
                      <div class="form-group col">
                        <label> Ecart</label>
                        <input type="number"  id="ecart" class="bg-danger  text-white font-weight-bold form-control @error('ecart') is-invalid @enderror"  name="ecart" placeholder="" value="{{old('ecart')}}" readonly>
                          @error('ecart')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div> 
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
        if ($("#fermeture_form").length > 0) {
            $("#fermeture_form").validate({
                // rules: {
                //     date_ouverture: {
                //         required: true,
                //     },
                
                //     solde_ouverture: {
                //         required: true,
                //         number: true,
                //     },

                //     date_fermeture: {
                //         required: true,
                //     },

                //     solde_fermeture: {
                //         required: true,
                //         number: true,
                //     },

                //     total_recette: {
                //         required: true,
                //         number: true,
                //     },

                //     total_depense: {
                //         required: true,
                //         number: true,
                //     },

                //     solde_theorique: {
                //         required: true,
                //         number: true,
                //     },

                //     solde_physique: {
                //         required: true,
                //         number: true,
                //     },

                //     ecart: {
                //         required: true,
                //         number: true,
                //     },

                // },

                messages: {
        
                    date_ouverture: {
                        required: "La date d'ouverture est obligatoire",
                    },
                
                    solde_ouverture: {
                        required: "Le solde d'ouverture est obligatoire",
                        number: "Le solde d'ouverture doit être un nombre valide",
                    },

                    date_fermeture: {
                        required: "Vous devez saisir la date de fermeture",
                    },

                    solde_fermeture: {
                        required: "Vous devez indiquer le solde de fermeture",
                        number: "Le solde de fermeture doit être un nombre valide",
                    },

                    total_recette: {
                        required: "Vous devez saisir le montant total des approvisionnements",
                        number: "Le montant total des approvisionnement doit être un nombre valide",
                    },

                    total_depense: {
                        required: "Vous devez saisir le montant total des depenses",
                        number: "Le montant total des depense doit être un nombre valide",
                    },

                    solde_theorique: {
                        required: "Vous devez saisir le solde théorique de la caisse",
                        number: "Le solde théorique de la caisse doit être un nombre valide",
                    },

                    solde_physique: {
                        required: "Vous devez saisir le solde physique de la caisse",
                        number: "Le solde physique de la caisse doit être un nombre valide",
                    },

                    ecart: {
                        required: "Vous devez l'écart entre le solde physique et le solde théorique",
                        number: "L'écart doit être un nombre valide",
                    },
                    
                },
            });
        }
        $('#solde_physique').change(function(){
            var solde_physique = $(this).val()
            var solde_theorique = $('#solde_theorique').val()
            var ecart = Number(solde_theorique) - Number(solde_physique)
            $('#ecart').val(ecart)
        }); 
    });
</script>
@endsection