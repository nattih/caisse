@extends('layouts.menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">{{ __('Enregistrement de recette' ) }}</div>
                <div class="card-body">
                    <form action="{{route('r.store')}}" method="post">
                        @csrf
                        <div class="form-row d-flex justify-content-between">
                          <div class="form-group col-md-6">
                            <label>Libellé</label>
                            <input type="text" class="form-control @error('libelle') is-invalid @enderror" type="text" name="libelle" placeholder="" value="{{ old('libelle') }}">
                              @error('libelle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-3">
                            <label> Auteur</label>
                            <input type="text" class="form-control @error('auteur') is-invalid @enderror" type="text" name="auteur" placeholder="" value="{{ old('auteur') }}">
                              @error('auteur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-6">
                              <label>Nature</label>
                              <select id="type_recette_id" class="form-control custom-select @error('type_recette_id') is-invalid @enderror" type="text" name="type_recette_id" placeholder="" value="{{ old('type_recette_id') }}">
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
                          <div class="form-group col-md-3">
                            <label>Solde Actuel</label>
                            <input type="text" class="form-control @error('auteur') is-invalid @enderror" type="text" name="auteur" placeholder="" value="{{ old('auteur') }}">
                              @error('auteur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        </div> 
                        <div class="form-row d-flex justify-content-between">
                          <div class="form-group col-md-6">
                            <label>Date d'acquisition</label>
                            <input type="date" class="form-control @error('date_recette') is-invalid @enderror" type="text" name="date_recette" placeholder="" value="{{ old('date_recette') }}">
                              @error('date_recette')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-3">
                            <label> Nouveau solde</label>
                            <input type="text" class="form-control @error('montant') is-invalid @enderror" type="text" name="montant" placeholder="" value="{{ old('montant') }}">
                              @error('montant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div> 
                        </div> 
                        <div class="form-row d-flex justify-content-between">
                          <div class="form-group col-md-6">
                            <label>Source</label>
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
                          <div class="form-group   col-auto mt-4">
                            <button type="submit" class="btn btn-info ">Ajouter</button>
                            <button type="reset" class="btn btn-dark ml-2  ">Annuler</button>
                          </div>  
                        </div>       
                      </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
