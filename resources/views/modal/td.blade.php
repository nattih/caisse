<!-- The Modal -->
<div class="modal fade modal-agent" id="{{'agent'.$typeDepense->id}}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-dark text-white">
          <h4 class="modal-title">Modification d'un pole</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <form action="{{route('td.update', $typeDepense->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group row">
                <label for="code" class="col-12 col-lg-2 text-right control-label col-form-label">Code:</label>
                <div class="col-12 col-lg-9">
                <input type="text" class="form-control" id="code" placeholder="Saisir le code ici" name="code" autocomplete="off" value="{{$typeDepense->code}}">
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-12 col-lg-2 text-right control-label col-form-label">Libellé:</label>
                <div class="col-12 col-lg-9">
                    <input type="text" class="form-control" id="description" placeholder="Saisir le libellé ici" name="description" autocomplete="off" value="{{$typeDepense->description}}">
                    <span class="text-danger">{{ $errors->first('description') }}</span>
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