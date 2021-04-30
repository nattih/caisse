<!-- The Modal -->
<div class="modal fade modal-agent" id="{{'agent'.$recette->id}}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header btn-sm text-center">
          <h5 class="modal-title text-center">Modifier {{$recette->libelle}} </h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{route('r.update', $recette->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Nature</label>
                      <select id="type_recette_id" class="form-control custom-select @error('type_recette_id') is-invalid @enderror" type="text" name="type_recette_id" placeholder="" value="{{ old('type_recette_id') }}">
                        <option> Chosir le type de recette</option>
                        @foreach($trs as $tr)  
                        <option value="{{$tr->id}}" {{$recette->type_recette_id == $tr->id ? 'selected' : ''}}>{{$tr->appro}}</option>
                    @endforeach
                      </select>
                        @error('type_recette_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Libellé</label>
                        <input type="text" class="form-control @error('libelle') is-invalid @enderror" type="text" name="libelle" placeholder="" value="{{ old('libelle') ?? $recette->libelle }}">
                          @error('libelle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                    </div>
                </div> 
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Date d'acquisition</label>
                    <input type="date" class="form-control @error('date_recette') is-invalid @enderror" type="text" name="date_recette" placeholder="" value="{{ old('date_recette') ?? $recette->date_recette}}">
                      @error('date_recette')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label> Montant</label>
                    <input type="text" class="form-control @error('montant') is-invalid @enderror" type="text" name="montant" placeholder="" value="{{ old('montant') ?? $recette->montant }}">
                      @error('montant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div> 
                </div> 
                <div class="form-row">
                  <div class="form-group col">
                    <label>Auteur</label>
                    <input type="text" id="" class="form-control @error('') is-invalid @enderror" name="" placeholder="" value="{{ old('user_id') ?? $recette->user->name}} {{ old('user_id') ?? $recette->user->prenom}}" readonly>
                      @error('')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label>Source</label>
                    <select id="source" class="form-control custom-select @error('source') is-invalid @enderror" type="text" name="source" placeholder="" value="{{ old('source') ?? $recette->libelle }}">
                      <option> Chosir le type de recette</option>
                      @foreach ($recette->getSourceOptions() as $key=>$value)
                      <option value="{{$key}}" {{$recette->source == $value ? 'selected' : ''}}> {{$value}}</option>
                    @endforeach
                    </select>
                      @error('source')
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