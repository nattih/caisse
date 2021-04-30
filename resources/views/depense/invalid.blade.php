@extends('layouts.menu')
@section('content')
<div class="row justify-content-center ">
    <div class="card col-11">
      <div class="mt-1">
        <h6 class="text-center text-uppercase font-weight-bold mt-1">Dépenses invalidées</h6>
        <a class="btn btn-warning" href="{{ route('d.list') }}">{{ __('Retour')}}</a>
        <div class="d-flex float-right">
          <div class=" text-center mr-2" >
            <h5 class="font-weight-bold text-danger">Total : {{number_format($totalDep, 2, ',', ' ') }} f CFA</h5>
          </div>
        <div> {{$depenses->links()}}</div>
      </div>
      </div>
            <div class="table table-responsive p-0">
              <table id="example1" class="table table-hover">
                <thead class="">
                <tr class=" btn-sm text-center">
                  <th scope="col">Date saisie</th>
                  <th scope="col">Libellé</th>
                  <th scope="col">Nature</th>
                  <th scope="col">Date dépense </th>
                  <th scope="col">Montant (f CFA)</th>
                  <th scope="col">fournisseur</th>
                  <th scope="col">Statut</th>
                  <th scope="col">Option</th>
                </tr>
                </thead>
                <tbody >
                  @foreach($depenses as $depense)
                <tr class="tablecolor text-center">
                  <td>{{$depense->created_at->format('d/m/y à H:m')}}</td>
                  <td>{{$depense->description}}</td>
                  <td>{{$depense->typeDepense->description}}</td>
                  <td>{{$depense->date_depense}}</td>
                  <td>{{number_format($depense->montant, 2, ',', ' ') }}</td>
                  <td>{{$depense->fournisseur}}</td>
                  <td> @switch($depense->statut)
                    @case(0) En cours...@break @case(1) Validée @break @default  Rejetée @endswitch
                  </td>
                  <td>
                    <a href=" {{route('invalid_dep.show',[$depense->id])}}"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a>
                    {{-- <a href="{{route('d.edit',$depense->id)}}  "><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a> --}}
                    <button data-toggle="modal" data-target="{{'#agent'.$depense->id}}" data-backdrop="static" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    @include('modal.depense')
                    <form action=" {{route('d.destroy',$depense->id)}} " method="post" class="d-inline">
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
        if ($("#depense_form").length > 0) {
            $("#depense_form").validate({
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