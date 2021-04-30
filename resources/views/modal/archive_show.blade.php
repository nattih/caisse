<!-- The Modal -->
<div class="modal fade modal-agent" id="{{'agent'.$user->id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header btn-sm ">
                <h4 class="modal-title "> {{$user->name}} {{$user->prenom}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="list-group mt-1">  
                    <div class="list-item text-bold row"><span class="col-6 text-bold" >Sexe: </span><span class="text-info font-weight-bold">{{$user->sexe}}   </div><br>
                    <div class="list-item text-bold row"><span class=" col-6 text-bold" >Date de naissance : </span><span class="text-info font-weight-bold"> {{$user->dat_naiss}}  </div><br>
                    <div class="list-item text-bold row"><span class="col-6 text-bold">Durée du contrat: </span> <span class="text-info font-weight-bold">{{$user->contrat}}</span>  </div><br>
                    <div class="list-item text-bold row"><span class="col-6 text-bold">Début de fonction: </span> <span class="text-info font-weight-bold">{{$user->debut_fonction}} </span> </div><br>
                </div>
            </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">fermer</button>
          </div>
      </div>
    </div>
  </div>