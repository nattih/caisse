@extends('layouts.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Session::has('message'))
               <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="card-header text-center font-weight-bold"> <i class="text-info fa fa-plus-circle" aria-hidden="true"></i>{{ __(' Nouveau agent') }}</div>

                <div class="card-body">
                    <form method="POST" id="agent_form" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col form-group">
                              <label class="font-weight-bold">Nom :</label>   
                                <input type="text" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col form-group">
                              <label class="font-weight-bold">Prénom(s) :</label>
                              <input type="text" class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" placeholder="" value="{{ old('prenom') }}">
                                @error('prenom')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div> 
                            <div class="form-group col">
                                <label class="font-weight-bold">Sexe :</label>
                                <select id="inputState" class="form-control custom-select @error('sexe') is-invalid @enderror" type="text" name="sexe" placeholder="" value="{{ old('sexe') }}">
                                  <option> Choose...</option>
                                    @foreach ($user->getSexeOptions() as $key=>$value)
                                      <option value="{{$key}}"> {{$value}}</option>
                                    @endforeach
                                </select>
                                    @error('sexe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div> 

                        <div class="form-row">
                            <div class="form-group col">
                              <label class="font-weight-bold">Date de naissance :</label>
                              <input type="date" class="form-control @error('dat_naiss') is-invalid @enderror" type="text" name="dat_naiss" placeholder="" value="{{ old('dat_naiss') }}">
                                @error('dat_naiss')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label class="font-weight-bold">Lieu de résidence :</label>
                                <input type="text" class="form-control @error('residence') is-invalid @enderror"  name="residence" placeholder="" value="{{ old('residence') }}">
                                  @error('residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>
                            <div class="form-group col">
                                <label class="font-weight-bold">Contact(s) :</label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror"  name="contact" placeholder="" value="{{ old('contact') }}">
                                  @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold">Pole :</label>
                                <select id="inputState" class="form-control custom-select @error('pole_id') is-invalid @enderror" type="text" name="pole_id" placeholder="" value="{{ old('pole_id') }}">
                                  <option> Choisir...</option>
                                    @foreach($poles as $pole)  
                                  <option value="{{$pole->id}}">{{$pole->nom}}</option>
                                    @endforeach
                                </select>
                                  @error('pole_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>
                            <div class="form-group col">
                                <label class="font-weight-bold">Debut de fonction :</label>
                                <input type="date" class="form-control @error('debut_fonction') is-invalid @enderror" type="text" name="debut_fonction" placeholder="" value="{{ old('debut_fonction') }}">
                                  @error('debut_fonction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>
                            <div class="form-group col">
                                <label class="font-weight-bold">Durée du contrat :</label>
                                <input type="text" class="form-control @error('contrat') is-invalid @enderror" type="text" name="contrat" placeholder="" value="{{ old('contrat') }}">
                                    @error('contrat')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                            </div> 
                        </div> 
                
                        <div class="form-row">
                            <div class="form-group col">
                              <label class="font-weight-bold">Photo :</label>
                              <input type="file" class="form-control @error('photo') is-invalid @enderror" type="text" name="photo" placeholder="" value="{{ old('photo') }}">
                                  @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>
                            <div class="form-group col">
                              <label class="font-weight-bold">Email :</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="" value="{{ old('email') }}">
                                @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div> 
                        </div> 
                        <div class="form-row">
                            <div class="form-group col">
                              <label class="font-weight-bold">Password :</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror" type="text" name="password" placeholder="" value="{{ old('password') }}">
                                @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group col">
                              <label class="font-weight-bold">Password confirm :</label>
                              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" type="text" name="password_confirmation" placeholder="" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div> 
                        </div> 
                            <div class="  float-right">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Ajouter') }}
                                </button>
                                <button type="reset" class="btn btn-dark">
                                    {{ __('Annuler') }}
                                </button>
                                 <a  class="btn btn-warning" href="{{route('etat.caisse')}}">{{ __('Fermer') }}</a>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
