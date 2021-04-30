@extends('layouts.menu')
@section('content')

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body text-center">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success  text-uppercase mb-1">total approvissionements</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($totalAppro , 2, ',', ' ') }} F cfa</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body text-center">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total depenses</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($totalDep, 2, ',', ' ')  }} F cfa</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body text-center">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold  text-warning text-uppercase mb-1">Solde de la caisse</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{number_format($solde, 2, ',', ' ')  }} F cfa</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body text-center">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total personnels</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$agents->count()}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="card col-4">
        <div class="card-header text-center btn-sm text-uppercase"> les approvissionements</div>
        <table class="table table-hover dataTable text-nowrap" id="exemple1">
          <tbody>
              @foreach($trs as $tr)
              <tr>
                  <td scope="row"> <a class="btn btn-success  form-control" href=" {{route('tr.show', $tr->id)}}  ">  {{$tr->appro}}  </a> </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    <div class="card col-4">
      <div class="card-header text-center btn-sm text-uppercase"> les depenses</div>
      <table class="table table-hover dataTable text-nowrap" id="exemple1">
        <tbody>
            @foreach($typeDepenses as $typeDepense)
            <tr>
                <td scope="row"> <a class="btn btn-danger  form-control " href=" {{route('td.show', $typeDepense->id)}} "> {{$typeDepense->description}} </a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
    <div class="card col-4">
      <div class="card-header text-center btn-sm text-uppercase"> les poles</div>
      <table class="table table-hover dataTable text-nowrap" id="exemple1">
        <tbody>
          @foreach ($poles as $pole)
            <tr>
                <td scope="row"> <a class="btn btn-info  form-control" href=" {{route('pole.show', $pole->id)}} "> {{$pole->nom}} </a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
 