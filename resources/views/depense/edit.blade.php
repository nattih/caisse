@extends('layouts.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">{{ __('Modification de') }} : {{$depense->description}} </div>
                <div class="card-body">
                    <form action="{{route('d.update',$depense)}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>Nature</label>
                              <select id="type_depense_id" class="form-control custom-select @error('type_depense_id') is-invalid @enderror" type="text" name="type_depense_id" placeholder="" value="{{ old('type_depense_id') }}">
                                @foreach($tds as $td)  
                                <option value="{{$td->id}}" {{$depense->type_depense_id == $td->id ? 'selected' : ''}}>{{$td->description}}</option>
                            @endforeach
                              </select>
                                @error('type_depense_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                              <label>Agent</label>
                              <select id="agent" class="form-control custom-select @error('agent') is-invalid @enderror" type="text" name="agent" placeholder="" value="{{ old('agent') }}">
                                @foreach($agents as $agent)  
                                <option value="{{$agent->id}}" {{$depense->user_id == $agent->id ? 'selected' : ''}}>{{$agent->name}} {{$agent->prenom}}</option>
                            @endforeach
                              </select>
                                @error('agent')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Date depense</label>
                            <input type="date" class="form-control @error('date_depense') is-invalid @enderror" name="date_depense" placeholder="" value="{{ old('date_depense') ?? $depense->date_depense  }}">
                              @error('date_depense')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label> Montant</label>
                            <input type="number" class="form-control @error('montant') is-invalid @enderror"  name="montant" placeholder="" value="{{ old('montant') ?? $depense->montant  }}">
                              @error('montant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div> 
                        </div> 
                        
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label> Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"   name="description" placeholder="" value="{{ old('description') ?? $depense->description }}">
                              @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label>Fournisseur</label>
                            <input type="text" class="form-control @error('fournisseur') is-invalid @enderror"  name="fournisseur" placeholder="" value="{{ old('fournisseur') ?? $depense->fournisseur }}">
                                @error('fournisseur')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div> 
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Commentaire</label>
                                <input type="text" class="form-control @error('commentaire') is-invalid @enderror"  name="commentaire" placeholder="" value="{{ old('commentaire') ?? $depense->commentaire}}">
                                  @error('commentaire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div> 
                            <div class="form-group col-md-6">
                            <label>Pièce justificative</label>
                            <input type="file" class="form-control @error('fichier') is-invalid @enderror"  name="fichier" placeholder="" value="{{ old('fichier') ?? $depense->fichier}}">
                                @error('fichier')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>
                        </div> 
                        <div class="form-group float-right col-auto">
                          <button type="submit" class="btn btn-info ">Modifier</button>
                          <button type="reset" class="btn btn-dark ml-2  ">Annuler</button>
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
