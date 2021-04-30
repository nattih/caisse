@extends('layouts.menu')
@section('content')
<div class="row justify-content-center">
    <div class=" col-md-12">
            <h6 class="text-center font-weight-bold text-uppercase mb-3">Type Approvisionnement</h6> 
        <div class="d-flex row">
            <div class="gauche card col-6 ">
                <div class="card-header text-center font-weight-bold"><i class="text-info fas fa-list"></i> Liste</div>
                <div class="card-body table-responsive  ">
                    <table class="table table-hover dataTable text-nowrap" id="exemple1">
                        <thead>
                            <tr class="btn-sm ">
                                <th scope="col">N°</th>
                                <th scope="col">Code</th>
                                <th scope="col">Approvisionnement</th>
                                <th scope="col">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($trs as $key=>$tr)
                            <tr>
                                <td scope="row">{{++$key}}</td>
                                <td scope="row">{{$tr->code}}</td>
                                <td scope="row"> {{$tr->appro}}</td>
                                <td scope="row" >
                                    <button data-toggle="modal" data-target="{{'#agent'.$tr->id}}" data-backdrop="static"class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    @include('modal.tr')
                                    <form action=" {{route('tr.destroy',$tr->id)}} " method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-trash " ></i> </button>
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                        {{$trs->links()}}
                </div>
            </div>
            <div class="droite card col-6 ">
                <div class="card-header text-center font-weight-bold"> <i class="text-info fas fa-plus-circle"></i>Ajouter</div>
                <div class="card-body">
                    <form method="post" action="{{ route('tr.store') }}" id="tr_form">
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
                            <label for="code" class="col-12 col-lg-2 text-right control-label col-form-label">Libelé:</label>
                            <div class="col">
                                <input id="appro" type="text" placeholder="entrez le appro" class="form-control @error('appro') is-invalid @enderror" name="appro" value="{{ old('appro') }}" autocomplete="appro" autofocus>
                                @error('appro')
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
        if ($("#tr_form").length > 0) {
            // $("#tr_form").validate({
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
            // });
        } 
    });
</script>
@endsection