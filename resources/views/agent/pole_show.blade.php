@extends('layouts.menu')
@section('content')
<div class="row justify-content-center">
    <div class="card col-md-10">
        <div class="card-header text-center">Nos agents </div>
        <div class="  table-responsive  p-2 m-1">
            <table class="table table-hover dataTable text-nowrap" id="exemple1">
                <thead>
                <tr class="btn-sm ">
                    <th scope="col">N°</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom(s)</th>
                    <th scope="col">Email</th>
                    <th scope="col">Résidence</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Actions </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                        <td scope="row">{{++$key}} </td>
                        <td scope="row">{{$user->name}} </td>
                        <td scope="row"> {{$user->prenom}} </td>
                        <td scope="row"> {{$user->email}} </td>
                        <td scope="row"> {{$user->residence}} </td>
                        <td scope="row">{{implode(' , ' , $user->roles()->get()->pluck('name')->toArray())}} </td>
                        <td scope="row" >
                            <a class="btn btn-success" href=" {{route('user.show',[$pole, $user])}}"><i class="fas fa-eye"></i></a>
                        <button data-toggle="modal" data-target="{{'#agent'.$user->id}}" data-backdrop="static"class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            @include('modal.agent_edit')
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
        <div class="card-footer ">
            <a href="{{route('etat.caisse')}}" class=" btn btn-warning">Fermer</a>
            <a class="btn btn-info float-right" href="{{ route('register') }}">{{ __('Ajouter un agent') }}</a>
        </div>
    </div>
</div>    
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#form_agent").length > 0) {
            $("#form_agent").validate({
        
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