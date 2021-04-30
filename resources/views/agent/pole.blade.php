@extends('layouts.menu')
@section('content')
<div class="row justify-content-center">
    <div class=" col-md-11">
        <h4 class="text-center text-uppercase font-weight-bold">Pole</h6> 
        <div class="d-flex row">
            <div class="gauche card col-6 ">
                <div class="card-header text-center font-weight-bold"><i class="text-info fas fa-plus-circle"></i> Nouveau</div>
                <div class="card-body">
                    <form class="form-horizontal" id="pole_form" action="{{route('pole.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label for="code" class="col-12 col-lg-2 text-right control-label col-form-label">Code:</label>
                                <div class="col-12 col-lg-9">
                                    <input type="text" class="form-control" id="code" placeholder="Saisir le code ici" name="code" autocomplete="off" value="{{old('code')}}">
                                    <span class="text-danger">{{ $errors->first('code') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-12 col-lg-2 text-right control-label col-form-label">Nom:</label>
                                <div class="col-12 col-lg-9">
                                    <input type="text" class="form-control" id="nom" placeholder="Saisir le nom du pole ici" name="nom" autocomplete="off" value="{{old('nom')}}">
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                </div>
                            </div>
                            <div class=" float-right mr-5">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Ajouter') }}
                                </button>
                                <button type="reset" class="btn btn-dark">
                                    {{ __('Annuler') }}
                                </button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="droite card col-6">
                <div class="card-header text-center font-weight-bold"><i class="text-info fas fa-list"></i> Liste</div>
                <div class=" card-body table-responsive  p-2 m-1">
                    <table class="table table-hover dataTable text-nowrap" id="exemple1">
                        <thead>
                            <tr class="btn-sm  text-center">
                                <th scope="col">Code</th>
                                <th scope="col">Libellé</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($poles as $pole)
                                <tr class="text-center">
                                    <td scope="row">{{$pole->code}}</td>
                                    <td scope="row">{{$pole->nom}}</td>
                                    <td scope="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="{{'#agent'.$pole->id}}" data-backdrop="static"> <i class="fas fa-edit"></i> </button>
                                        @include('modal.pole')
                                        <form action=" {{route('pole.destroy',$pole->id)}} " method="post" class="d-inline">
                                            @csrf
                                                @method('DELETE')
                                                  <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i></button>
                                          </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$poles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="mt-1 d-flex justify-content-center"><a href="{{route('home')}}" class=" btn btn-warning">Fermer</a></div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#pole_form").length > 0) {
            // $("#pole_form").validate({
        
            //     rules: {
            //         code: {
            //             required: true,
            //             unique: true,
            //         },

            //         nom: {
            //             required: true,
            //             unique: true,
            //         },
            //     },
            //     messages: {
        
            //         code: {
            //             required: "Le code est obligatoire",
            //             unique: "Le code ne doit pas être dupliqué"
            //         },

            //         nom: {
            //             required: "Le nom est obligatoire",
            //         },
            //     },
            // });
        } 
    });
</script>
@endsection