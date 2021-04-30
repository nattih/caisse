@extends('layouts.menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"><br> <br>
            <div class="card mt-3"> 
                <div class="card-header font-weight-bold text-center">{{ __('Ouverture du compte' ) }}</div>
                <div class="card-body">
                    <form action="{{route('ouverture.compte')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Date d'ouverture</label>
                                <input type="date" class="form-control text-danger font-weight-bold @error('date_ouverture') is-invalid @enderror" type="text" name="date_ouverture" placeholder="" value="<?php echo date('Y-m-d'); ?>">
                                @error('date_ouverture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Solde à l'ouverture</label>
                                <input type="number" class="form-control font-weight-bold @error('solde_ouverture') is-invalid @enderror"  id="solde_ouverture"
                                name="solde_ouverture" value="{{$actuelSolde}}" readonly>
                                @error('solde_ouverture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold">Agent</label>
                                <input type="text" class="form-control font-weight-bold " type="text" name="" placeholder="" value="{{ __(auth()->user()->name)}} {{ __(auth()->user()->prenom)}} " readonly>
                            </div>
                        </div>  
                        <div class="form-group float-right col-auto">
                            <button type="submit" class="btn btn-info ">Ouvrir</button>
                            <button type="reset" class="btn btn-dark ml-2 ">Annuler</button>
                        </div>         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
