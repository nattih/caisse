@extends('layouts.menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="card">
                <div class="card-header text-center font-weight-bold"><i class="text-info fas fa-plus-circle"></i>{{ __('  Ajouter depense') }}</div>
                <div class="card-body">
                    <form action="{{route('d.store')}}" method="post" id="depense_form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label class="font-weight-bold">Nature :</label>
                              <select id="type_depense_id" class="form-control custom-select @error('type_depense_id') is-invalid @enderror" type="text" name="type_depense_id" placeholder="" value="{{ old('type_depense_id') }}">
                                <option> Chosir le type de depense</option>
                                @foreach($tds as $td)  
                                <option value="{{$td->id}}">{{$td->description}}</option>
                               @endforeach
                              </select>
                                @error('type_depense_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                              <label class="font-weight-bold">Agent concerné :</label>
                              <select id="agent" class="form-control custom-select " type="text" name="agent">
                                <option> Chosir le nom de l'agent</option>
                                <option value=" ">   </option>
                              </select>
                            </div>
                        </div> 
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label class="font-weight-bold">Date depense :</label>
                            <input type="date" class="form-control @error('date_depense') is-invalid @enderror" type="text" name="date_depense" placeholder="" value="{{ old('date_depense') }}">
                              @error('date_depense')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label class="font-weight-bold"> Montant :</label>
                            <input type="text" class="form-control @error('montant') is-invalid @enderror" type="text" name="montant" placeholder="" value="{{ old('montant') }}">
                              @error('montant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div> 
                        </div> 
                        
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label class="font-weight-bold"> Description :</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" type="text" name="description" placeholder="" value="{{ old('description') }}">
                              @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label class="font-weight-bold">Fournisseur :</label>
                            <input type="text" class="form-control @error('fournisseur') is-invalid @enderror" type="text" name="fournisseur" placeholder="" value="{{ old('fournisseur') }}">
                                @error('fournisseur')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div> 
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Commentaire :</label>
                                <input type="commentaire" class="form-control @error('commentaire') is-invalid @enderror" type="text" name="commentaire" placeholder="" value="{{ old('commentaire') }}">
                                  @error('commentaire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div> 
                            <div class="form-group col-md-6">
                            <label class="font-weight-bold">Pièce justificative :</label>
                            <input type="file" class="form-control @error('fichier') is-invalid @enderror" type="text" name="fichier" placeholder="" value="{{ old('fichier') }}">
                                @error('fichier')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>
                        </div> 
                        <div class="form-group d-flex float-right col-auto">
                          <button type="submit" class="btn btn-info  ">Ajouter</button>
                          <button type="reset" class="btn btn-dark ml-2  ">Annuler</button>
                          <a  class="btn btn-warning ml-2 " href="{{route('home')}}">{{ __('Fermer') }}</a> 
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
@section('script')
<script>
    $(document).ready(function(){
        if ($("#depense_form").length > 0) {
            // $("#depense_form").validate({
        
            //     rules: {
            //         dateSaisie: {
            //             required: true,
            //         },
                
            //         dateDepense: {
            //             required: true,
            //         },

            //         montant: {
            //             required: true,
            //             number: true,
            //         },

            //         nature_depense_id: {
            //             required: true,
            //         },

            //         fournisseur: {
            //             required: true,
            //         },

            //         description: {
            //             required: true,
            //         },

            //         commentaire: {
            //             required: true,
            //         },

            //         fichier: {
            //             required: true,
            //             // extension: "pdf|jpg|png",
            //             // maxlength: 2048,
            //         },

            //     },

            //     messages: {
        
            //         dateSaisie: {
            //             required: "La date de saisie de la depense est obligatoire",
            //         },
                
            //         dateDepense: {
            //             required: "La date de la depense est obligatoire",
            //         },

            //         montant: {
            //             required: "Vous devez saisir le montant de la depense",
            //             number: "Le montant de la depense doit être un nombre valide",
            //         },

            //         fournisseur: {
            //             required: "Vous devez indiquer le nom du fournisseur",
            //         },

            //         description: {
            //             required: "Vous devez décrire la depense",
            //         },

            //         Commentaire: {
            //             required: "Vous devez ajouter un commentaire",
            //         },

            //         fichier: {
            //             required: "Vous devez choisir un fichier justificatif",
            //             // extension: "Le fichier doit être au format pdf, jpg ou png",
            //             // maxlength: "la taille du fichier ne doit pas excéder 2 Mo",
            //         },
                    
            //     },
            // });
        }
        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function (e) {
        //             $('#fichier_upload_preview').attr('src', e.target.result);
        //         }

        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

        // $("#fichier").change(function () {
        //     readURL(this);
        // }); 
    });
</script>
@endsection