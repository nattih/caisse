<!-- The Modal -->
<div class="modal fade modal-agent" id="{{'agent'.$user->id}}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-dark ">
          <h4 class="modal-title"> {{$user->name}} {{$user->prenom}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <form action="{{route('update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group row">
                <label for="salaire" class="col-12 col-lg-2 text-right control-label col-form-label">Salaire:</label>
                <div class="col-12 col-lg-9">
                <input type="text" class="form-control" id="salaire" placeholder="Saisir le salaire ici" name="salaire" autocomplete="off" value="{{$user->salaire}}">
                    <span class="text-danger">{{ $errors->first('salaire') }}</span>
                </div>
            </div>
            <div class="form-group row">
              <label for="libelle" class="col-12 col-lg-2 text-right control-label col-form-label">Libellé:</label>
              <div class="col-12 col-lg-9">
                @foreach ($roles as $role )
                <div class="form-group form-check">
                 <input type="checkbox" class="form-check-input" id="roles" name="roles[]" value="{{$role->id}}" 
                 id="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked
                  @endif> 
                <label for="{{$role->id}}" class="form-check-label">{{$role->name}}</label>    
                </div>   
               @endforeach
              </div>
          </div>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Modifier</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">fermer</button>
          </div>
        </form>
      </div>
    </div>
  </div>