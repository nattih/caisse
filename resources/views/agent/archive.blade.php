@extends('layouts.menu')
@section('content')
<div class="row justify-content-center">
    <div class="card col">
        <div class="card-header text-center">Nos anciens agents </div>
        <div class="  table-responsive  p-2 m-1">
            <table class="table table-hover dataTable text-nowrap text-center" id="exemple1">
                <thead>
                <tr class="btn-sm ">
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom(s)</th>
                    <th scope="col">Email</th>
                    <th scope="col">Résidence</th>
                    <th scope="col">Pole</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Desactiver</th>
                    <th scope="col">Actions </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                        <td scope="row">{{$user->name}} </td>
                        <td scope="row"> {{$user->prenom}} </td>
                        <td scope="row"> {{$user->email}} </td>
                        <td scope="row"> {{$user->residence}} </td>
                        <td scope="row"> {{$user->pole->nom}} </td>
                        <td scope="row"> {{$user->contact}} </td>
                        <td >{{$user->updated_at->format('d/m/y à H:m')}}</td>
                        <td scope="row" >
                            <button data-toggle="modal" data-target="{{'#agent'.$user->id}}" data-backdrop="static"class="btn btn-primary"><i class="fas fa-eye"></i></button>
                            @include('modal.archive_show')
                            <form action="{{route('activer.user',$user->id)}} " method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                            <button type="submit" class="btn btn-success"> Activer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
        <div class="card-footer ">
            <a href="{{route('agent')}}" class=" btn btn-warning">Fermer</a>
        </div>
    </div>
</div>    
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#form_agent").length > 0) {
            $("#form_agent").validate({
            });
        } 
    });
</script>
@endsection