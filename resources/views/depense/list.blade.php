@extends('layouts.menu')
@section('content')
<div class="row justify-content-center ">
    <div class="card col-11">
      @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
			@endif
      <div class="mt-1">
        <h5 class="text-center text-uppercase font-weight-bold">Nos dépenses</h5>
        <a class="btn btn-info" href="{{ route('d.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> {{ __('Dépenses') }}</a>
        <a class="btn btn-info" href="{{ route('d.invalid') }}"><i class="fa fa-list" aria-hidden="true"></i> {{ __('liste non vaidé') }} <span class="text-warning btn-sm">{{$nombres->count()}}</span></a>
        <div class="d-flex float-right">
          <div class=" text-center mr-2" >
            <button class="font-weight-bold text-uppercase bg-white text-danger mt-1">Total : {{number_format( $totalDep, 2, ',', ' ') }} f CFA </button>
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
                  <th scope="col">Option</th>
                </tr>
                </thead>
                <tbody >
                  @foreach($depenses as $depense)
                <tr class="tablecolor text-center">
                  <td class=" font-weight-bold">{{$depense->created_at->format('d/m/y à H:m')}}</td>
                  <td>{{$depense->description}}</td>
                  <td>{{$depense->typeDepense->description}}</td>
                  <td>{{$depense->date_depense}}</td>
                  <td class="text-danger font-weight-bold">{{number_format($depense->montant, 2, ',', ' ') }}</td>
                  <td>{{$depense->fournisseur}}</td>
                  <td>
                    <a href=" {{route('d.show',[$depense->id])}}"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a>
                  </td>
                </tr>
            </tbody>
              @endforeach
          </table>
      </div>
    </div>
</div>    
@endsection
  
  

  
  
  
  
   