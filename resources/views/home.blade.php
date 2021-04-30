@extends('layouts.menu')
@section('content')
<body id="page-top">
    <div id="wrapper">
      <div id="content-wrapper" class="d-flex flex-column ">
        <div id="content ">
          @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
				   @endif
          <div class="container-fluid  " >
            <div class="card  bg text-center">
              <section id="hero" class="d-flex flex-column card-body  ">
                <div class="hero-container" data-aos="fade-in">
                  <h1>Gestion de la caisse</h1> <br> <br> <br>
                  <p>Bienvenue sur votre <span class="typed" data-typed-items="Application, Plateforme, Espace de travail,"></span></p>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
@endsection
