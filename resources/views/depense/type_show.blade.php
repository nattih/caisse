@extends('layouts.menu')
@section('content')
<div class="row justify-content-center ">
  <div class="card col">
      @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
			@endif
    <div class="mt-1">
      <h5 class="text-center ">Total :<span class="btn-sm text-warning  font-weight-bold">{{number_format($totalDep, 2, ',', ' ') }} f CFA</span></h5>
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
                  <td>
                    <a href=" {{route('etat_depense.show',[$typeDepense, $depense])}}"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a>
                  </td>
                </tr>
            </tbody>
              @endforeach
          </table>
      </div>
    </div>
</div>
<div class="mt-2 d-flex justify-content-between">
  <div> <a href="{{route('etat.caisse')}}" class=" btn btn-warning">Fermer</a></div>
  <div>  {{$depenses->links()}}</div>
</div>   
@endsection