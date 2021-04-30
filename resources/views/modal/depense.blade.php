<!-- The Modal -->
<div class="modal fade modal-agent" id="{{'agent'.$depense->id}}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header btn-sm text-center">
          <h5 class="modal-title text-center">Modifier : {{$depense->description}} </h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{route('d.update', $depense->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
            <div class="modal-body">
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
                    <input type="date" class="form-control @error('date_depense') is-invalid @enderror" type="text" name="date_depense" placeholder="" value="{{ old('date_depense') ?? $depense->date_depense  }}">
                      @error('date_depense')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label> Montant</label>
                    <input type="text" class="form-control @error('montant') is-invalid @enderror" type="text" name="montant" placeholder="" value="{{ old('montant') ?? $depense->montant  }}">
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
                    <input type="text" class="form-control @error('description') is-invalid @enderror" type="text" name="description" placeholder="" value="{{ old('description') ?? $depense->description }}">
                      @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label>Fournisseur</label>
                    <input type="text" class="form-control @error('fournisseur') is-invalid @enderror" type="text" name="fournisseur" placeholder="" value="{{ old('fournisseur') ?? $depense->fournisseur }}">
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
                        <input type="commentaire" class="form-control @error('commentaire') is-invalid @enderror" type="text" name="commentaire" placeholder="" value="{{ old('commentaire') ?? $depense->commentaire}}">
                          @error('commentaire')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div> 
                    <div class="form-group col-md-6">
                    <label>Pièce justificative</label>
                    <input type="file" class="form-control @error('fichier') is-invalid @enderror" type="text" name="fichier" placeholder="" value="{{ old('fichier') ?? $depense->fichier}}">
                        @error('fichier')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                  </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Modifier</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">fermer</button>
            </div>
        </form>
      </div>
    </div>
</div>