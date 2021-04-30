@extends('layouts.menu')
@section('content')
<div class="row justify-content-center ">
    <div class="card col-12">
      @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
				   @endif
      <div class="mt-1">
        <h5 class="text-center ">Total :<span class="btn-sm text-warning  font-weight-bold">  {{ number_format($totalRecet, 2, ',', ' ') }} f CFA</span></h5>
      </div>
            <div class="table table-responsive p-0">
              <table id="example1" class="table table-hover">
                <thead class="text-white">
                <tr class="btn-sm text-center">
                  <th scope="col">Date saisie</th>
                  <th scope="col">Libellé</th>
                  <th scope="col">Nature</th>
                  <th scope="col">Date approv</th>
                  <th scope="col">Montant (f CFA)</th>
                  <th scope="col">Auteur</th>
                  <th scope="col">Source</th>
                  <th scope="col">Solde (f CFA)</th>
                </tr>
                </thead>
                <tbody >
                  @foreach($recettes as $recette)
                <tr class="tablecolor text-center">
                  <td>{{$recette->created_at->format('d/m/y à H:m')}}</td>
                  <td>{{$recette->libelle}}</td>
                  <td>{{$recette->typeRecette->appro}}</td>
                  <td>{{$recette->date_recette}}</td>
                  <td class="text-success font-weight-bold"> {{number_format($recette->montant, 2, ',', ' ') }}</td> 
                  <td>{{$recette->user->name}} {{$recette->user->prenom}}</td>
                  <td>{{$recette->source}}</td>
                <td>{{number_format($recette->nouveau_solde, 2, ',', ' ')}}</td>
                </tr>
            </tbody>
              @endforeach
          </table>
      </div>
    </div>
</div> 
<div class="mt-2 d-flex justify-content-between">
  <div> <a href="{{route('etat.caisse')}}" class=" btn btn-warning">Fermer</a></div>
  <div>  {{$recettes->links()}}</div>
</div>  
@endsection
  
  

  
  
  
  
   