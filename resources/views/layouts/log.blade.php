<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CHE²-Conseil étudiant</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
    type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/log.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4aa80cefec.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>


</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">CHE²-Conseil Etudiant</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ asset('/post') }}"> Plateforme </a>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ asset('/#contact') }}">Contact</a>
          </li>
          @guest
            <li class="nav-item">
              <i class="fad fa-portal-enter"> <a class="nav-link js-scroll-trigger"
                  href="{{ url('/login') }}">Connexion</a></i>
            </li>
          @endguest
        </ul>
        @if(Auth::check() && Auth::user()->compte_check == 1)
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->nom }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">

            <a class=" dropdown-item " href="{{ url('/profil') }}">
              <i class="fas fa-user-edit"></i> Mon profil
            </a>
            <a class=" dropdown-item " href="{{ url('/') }}">
              <i class="fas fa-house-user"></i> Home
            </a>
            @if( Auth::user()->membre==1)
              <a class=" dropdown-item nav-item " href="{{ url('/membre') }}">
                <strong><i class="fas fa-crown"></i> Espace membre </strong></a>
              </a>
            @endif
            <a class=" dropdown-item " href="{{ url('/post/create') }}">
              <i class="fas fa-plus-circle"></i> Ajouter une annonce
            </a>

            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
              <i class="fas fa-door-open"></i> {{ __('Logout') }}
            </a>


            <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
              @csrf
            </form>
          </div>
        @endif
      </div>
    </div>
  </nav>


  @yield('content')

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('/js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ asset('/js/jquery-easing/jquery.easing.min.js') }}"></script>



  <!-- Custom scripts for this template -->
  <script src="{{ asset('/js/agency.min.js') }}"></script>
</body>

</html>
