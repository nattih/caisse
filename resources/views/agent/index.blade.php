@extends('layouts.menu')
@section('content')
<div class="row justify-content-center">
    <div class="card col-md-11">
        <div class="card-header text-center font-weight-bold">Nos agents</div>
        <div class="  table-responsive  p-2 m-1">
            <table class="table table-hover dataTable text-nowrap text-center" id="exemple1">
                <thead>
                <tr class="btn-sm ">
                    <th scope="col">N°</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom(s)</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Salaire</th>
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
                        <td scope="row">{{implode(' , ' , $user->roles()->get()->pluck('name')->toArray())}} </td>
                        <td scope="row"> {{$user->salaire}} </td>
                        <td scope="row" >
                            <button data-toggle="modal" data-target="{{'#agent'.$user->id}}" data-backdrop="static"class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                @include('modal.agent')
                                <form action="{{route('destroy',$user->id)}} " method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                            <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{route('archive-agent')}}" class=" btn btn-success">Archives-agent</a>
            <a href="{{route('home')}}" class=" btn btn-warning">Fermer</a>
            <a class="btn btn-info " href="{{ route('register') }}"><i class=" fas fa-plus-circle"></i>{{ __(' Ajouter un agent') }}</a>
        </div>
    </div>
</div>    
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#form_agent").length > 0) {
            $("#form_agent").validate({
        
                rules: {
                    name: {
                        required: true,
                        // unique: true,
                    },

                    prenom: {
                        required: true,
                        // unique: true,
                    },
                    roles: {
                        required: true,
                        // number: true,
                    },
                },
                messages: {
        
                    name: {
                        required: "Le code est obligatoire",
                        // unique: "Le code ne doit pas être dupliqué"
                    },

                    prenom: {
                        required: "Le nom est obligatoire",
                    },
                    roles: {
                        required: "Le nom est obligatoire",
                    },
                },
            });
        } 
    });
</script>
@endsection