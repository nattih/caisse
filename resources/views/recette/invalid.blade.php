@extends('layouts.menu')
@section('content')
<div class="row justify-content-center ">
    <div class="card col-12">
      <div class="mt-1">
        <h5 class="text-center font-weight-bold text-uppercase">Nos approvionnements</h5>
        <a class="btn btn-warning" href="{{route('r.list')}}"> {{ __('Retour') }}</a>
        <div class="float-right">
          {{$recettes->links()}}
        </div>
      </div>
            <div class="table table-responsive p-0">
              <table id="example1" class="table table-hover">
                <thead class="text-white">
                <tr class="btn-sm text-center">
                  <th scope="col">Date saisie</th>
                  <th scope="col">Libellé</th>
                  <th scope="col">Date approvionnement </th>
                  <th scope="col">Montant (f CFA)</th>
                  <th scope="col">Solde</th>
                  <th scope="col">Statut</th>
                  <th scope="col" class="text-center">Option</th>
                </tr>
                </thead>
                <tbody >
                  @foreach($recettes as $recette)
                <tr class="tablecolor text-center">
                  <td>{{$recette->created_at->format('d/m/y à H:m')}}</td>
                  <td>{{$recette->libelle}}</td>
                  <td>{{$recette->date_recette}}</td>
                  <td class="text-success font-weight-bold"> {{number_format($recette->montant, 2, ',', ' ') }}</td> 
                <td>{{$recette->nouveau_solde}}</td>
                <td> @switch($recette->statut)
                    @case(0) En cours...@break @case(1) Validée @break @default  Rejetée @endswitch
                  </td>
                  <td>
                    <button data-toggle="modal" data-target="{{'#agent'.$recette->id}}" data-backdrop="static"class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    @include('modal.recette')
                    <a href=" {{route('invalid.show',[$recette->id])}}"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a>
                    {{-- <a href="{{route('r.edit',$recette->id)}}  "><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a> --}}
                    <form action=" {{route('r.destroy',$recette->id)}} " method="post" class="d-inline">
                        @csrf
                            @method('DELETE')
                            @can('manage-users') <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i></button> @endcan
                      </form>
                  </td>
                </tr>
            </tbody>
              @endforeach
          </table>
      </div>
    </div>
</div>    
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#recette_form").length > 0) {
            $("#recette_form").validate({
        
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