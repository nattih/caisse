 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Login</title>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('auth/style.css')}}">
 </head>

    <body>
        <div class="container-fluid"><br><br> <br>
            <div class="row main-content   text-center">
                <div class="col-md-5 text-center company__info bg-dark">
                    <img class="img-profile img-fluid  " src=" {{asset('assets/img/logo.jpg')}} " alt="logo-A2SYS"> 
                </div>
                <div class="col-md-7 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="row text-center">
                            <h2 >Connectez-vous!</h2>
                        </div>
                        <div class="row">
                            <form method="POST" action="{{ route('login') }}" class="form-group">
                                @csrf
                                <div class="row">
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form__input @error('email') is-invalid @enderror" placeholder="Entrez votre email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="row">
                                    <input type="password" name="password" id="password" class="form__input @error('password') is-invalid @enderror" placeholder="Entrez votre mot de passe">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="row">
                                    <input type="checkbox" name="remember_me" id="remember_me"  {{ old('remember') ? 'checked' : '' }} class="form-check-input">
                                    <label for="remember_me">Souvenir de moi!</label>
                                </div>
                                <div class="row">
                                    <input type="submit" value="Connexion" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
