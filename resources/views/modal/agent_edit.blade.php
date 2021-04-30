<!-- The Modal -->
<div class="modal fade modal-agent" id="{{'agent'.$user->id}}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header btn-sm text-center">
          <h5 class="modal-title text-center">Modifier {{$user->name}} {{$user->prenom}}</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{route('agent.update', $user->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
            <div class="modal-body">
                <div class="form-group row">
                    <label for="code" class="col-12 col-lg-2 text-right control-label col-form-label">Nom:</label>
                    <div class="col-12 col-lg-9">
                    <input type="text" class="form-control" id="name" placeholder="Saisir le code ici" name="name" autocomplete="off" value="{{$user->name}}">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="libelle" class="col-12 col-lg-2 text-right control-label col-form-label">Prenom (s):</label>
                    <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="prenom" placeholder="Saisir le libellé ici" name="prenom" autocomplete="off" value="{{$user->prenom}}">
                        <span class="text-danger">{{ $errors->first('prenom') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="residence" class="col-12 col-lg-2 text-right control-label col-form-label">Résidence:</label>
                    <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="residence" placeholder="Saisir le libellé ici" name="residence" autocomplete="off" value="{{$user->residence}}">
                        <span class="text-danger">{{ $errors->first('residence') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-12 col-lg-2 text-right control-label col-form-label">Email:</label>
                    <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="email" placeholder="Saisir le libellé ici" name="email" autocomplete="off" value="{{$user->email}}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contact" class="col-12 col-lg-2 text-right control-label col-form-label">Contact:</label>
                    <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="contact" placeholder="Saisir le libellé ici" name="contact" autocomplete="off" value="{{$user->contact}}">
                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-12 col-lg-2 text-right control-label col-form-label">Pole</label>
                    <div class="col-12 col-lg-9">
                        <select id="inputState" class="form-control custom-select @error('pole_id') is-invalid @enderror" type="text" name="pole_id" placeholder=""  >
                            @foreach($poles as $pole)  
                        <option value="{{$pole->id}} " {{$user->pole_id == $pole->id ? 'selected' : ''}}>{{$pole->nom}}</option>
                            @endforeach
                        </select>
                        @error('pole_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="contrat" class="col-12 col-lg-2 text-right control-label col-form-label">Contrat:</label>
                    <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="contrat" placeholder="Saisir le libellé ici" name="contrat" autocomplete="off" value="{{$user->contrat}}">
                        <span class="text-danger">{{ $errors->first('contrat') }}</span>
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