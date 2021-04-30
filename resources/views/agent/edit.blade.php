@extends('layouts.menu')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="card col-8">
      <div class="card-header">Modifier <strong>{{$user->name}}</strong></div>

          <div class="card-body">
            <form action="{{route('update', $user)}}" method="post">
             @csrf
             @method('PATCH')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label ">{{ __('Nom de l\'ulisateur') }}</label>
                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                        value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prenom" class="col-md-4 col-form-label ">{{ __('Nom de l\'ulisateur') }}</label>
                    <div class="col-md-12">
                        <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" 
                        value="{{ old('prenom') ?? $user->prenom }}" required autocomplete="prenom" autofocus>
                        @error('prenom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

             <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label ">{{ __('Addresse E-Mail') }}</label>

              <div class="col-md-12">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') ?? $user->email  }}" required autocomplete="email" autofocus>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

              @foreach ($roles as $role )
              <div class="form-group form-check">
               <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" 
               id="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked
                @endif> 
              <label for="{{$role->id}}" class="form-check-label">{{$role->name}}</label>    
              </div>   
             @endforeach
             <div class="form-group d-flex float-right col-auto">
                <button type="submit" class="btn btn-info  ">Modifier</button>
                <button type="reset" class="btn btn-dark ml-2  ">Annuler</button>
              </div> 
            </form>
          </div>
      </div>
  </div>
</div>
@endsection