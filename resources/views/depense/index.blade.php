 
@extends('layouts.menu')
@section('content')
<div class="row justify-content-center">
    <div class=" col-md-12">
        <h6 class="text-center text-uppercase font-weight-bold">Type Depense</h6> 
        <div class="d-flex row">
            <div class="gauche card col-6 ">
                <div class="card-header text-center font-weight-bold"> <i class="text-info fa fa-list " ></i> Liste</div>
                <div class="card-body table-responsive  ">
                    <table class="table table-hover dataTable text-nowrap" id="exemple1">
                        <thead>
                            <tr class="btn-sm">
                                <th scope="col">N°</th>
                                <th scope="col">Code</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($typeDepenses as $key=>$typeDepense)
                            <tr>
                                <td scope="row">{{++$key}} </td>
                                <td scope="row">{{$typeDepense->code}} </td>
                                <td scope="row">  {{$typeDepense->description}}  </td>
                                <td scope="row" >
                                    <button data-toggle="modal" data-target="{{'#agent'.$typeDepense->id}}" data-backdrop="static"class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    @include('modal.td')
                                    <form action=" {{route('td.destroy',$typeDepense->id)}} " method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-trash " ></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$typeDepenses->links()}}
                </div>
            </div>
            <div class="droite card col-6 ">
                <div class="card-header text-center font-weight-bold"><i class="text-info fa fa-plus-circle " ></i> {{ __('Nouveau type') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('td.store') }}" id="td_form">
                        @csrf
                        <div class="form-group row">
                            <label for="code" class="col-12 col-lg-2 text-right control-label col-form-label">Code:</label>
                            <div class="col ">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}"  placeholder="ajouter le code ">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-12 col-lg-2 text-right control-label col-form-label">Libellé :</label>
                            <div class="col">
                                <input id="description" type="text" placeholder="entrez le description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group d-flex float-right col-auto">
                            <button type="submit" class="btn btn-info  ">Ajouter</button>
                            <button type="reset" class="btn btn-dark ml-2  ">Annuler</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-1"><a href="{{route('home')}}" class=" btn btn-warning">Fermer</a></div>
</div>    
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#td_form").length > 0) {
            $("#td_form").validate({
                // rules: {
                //     name: {
                //         required: true,
                //         // unique: true,
                //     },

                //     prenom: {
                //         required: true,
                //         // unique: true,
                //     },
                //     roles: {
                //         required: true,
                //         // number: true,
                //     },
                // },
                // messages: {
        
                //     name: {
                //         required: "Le code est obligatoire",
                //         // unique: "Le code ne doit pas être dupliqué"
                //     },

                //     prenom: {
                //         required: "Le nom est obligatoire",
                //     },
                //     roles: {
                //         required: "Le nom est obligatoire",
                //     },
                // },
            });
        } 
    });
</script>
@endsection