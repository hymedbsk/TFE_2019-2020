<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CHE²-Conseil étudiant</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
  {!! NoCaptcha::renderJs() !!}
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">CHE²-Conseil Etudiant</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ asset('/post') }}"> Plate-forme </a>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ asset('/#contact') }}">Contact</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/login') }}">Connexion</a>
          </li>
          @endguest
        </ul>
        @if(Auth::check())
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nom }} <span class="caret"></span>
                </a>

                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">

                            <a class=" dropdown-item " href="{{ url('/profil') }}">
                                 <p>  Mon profil </p>
                             </a>

                             <a class=" dropdown-item " href="{{ url('/user') }}">
                                <p>  Gestion des utilisateurs </p>
                            </a>

                             <a class=" dropdown-item nav-item " href="{{ url('/post/create') }}" >
                                <p>  Ajouter une annonce  </p>
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @endif
                </div>
            </div>
        </nav>


            @yield('content')


    <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('/js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ asset('/js/jquery-easing/jquery.easing.min.js') }}"></script>



  <!-- Custom scripts for this template -->
  <script src="{{ asset('/js/agency.min.js') }}"></script>
</body>
</html>
