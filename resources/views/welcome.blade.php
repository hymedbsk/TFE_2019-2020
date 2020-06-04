<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CHE²-Conseil étudiant</title>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
    type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <link href="{{ asset('css/agency.css') }}" rel="stylesheet">

</head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">CHE²-Conseil ��ùtudiant</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
          data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
          aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Nos partenaires</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Photos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Nos missions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ asset('/plateforme') }}"> Plateforme </a>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/login') }}">Connexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead">
      <div class="container">
        <div class="intro-text">

        </div>
    </header>

    <section class="page-section" id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Nos partenaires</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Green Man Bar </h4>
            <p class="text-muted"><img class="img-fluid"
                src="{{ asset('img/partenaires/greenMan.png') }}" alt="green man bar"></p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"></h4>
            <p class="text-muted"></p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Mezzo Bar</h4>
            <p class="text-muted"><img class="img-fluid"
                src="{{ asset('img/partenaires/mezzo.jpeg') }}" alt="mezzo"></p>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-light page-section" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Quelques photos</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="modal24h">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('img/photo/24hChe2.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>24h vélo</h4>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('img/photo/stNicolasLln.png') }}"
                alt="st Nicolas">
            </a>
            <div class="portfolio-caption">
              <h4>Saint Nicolas</h4>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/photo/equipe.jpg" alt="équipe 2019-2020">
            </a>
            <div class="portfolio-caption">
              <h4>l'équipe </h4>
              <p class="text-muted">2019-2020</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="portfolio-modal modal fade" id="modal24" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-12 mx-auto">
                <div class="modal-body">
                  <img class="img-fluid" src="img/photo/24hChe2.png" alt="24hche2">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="page-section" id="about">
      <div class="container">
        <div class="row">

        </div>
      </div>
    </section>

    <section class="page-section" id="propos">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Nos missions</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">

          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">

                    <h4 class="subheading">Représenter les étudiants</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Le Conseil étudiant représente l'ensemble des étudiants et porte leur voix dans
                      les différents organes décisionnels de l'établissement. Au même titre que le corps professoral, les
                      étudiants constituent donc un acteur essentiel dans chaque établissement. Ils ont leur mot à dire au
                      sein de l'école et c'est par la voix des représentants des étudiants que cela doit passer.
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Défendre et promouvoir les intérêts des étudiants</h4>
                    <h4 class="subheading"></h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Le rôle d'un représentant étudiant est de relayer les problématiques qui
                      concernent les étudiants dans les instances adéquates: mauvais état des bâtiments, coût trop élevé
                      du matériel scolaire, manque de place dans les locaux ou bibliothèques, inexistence de cantine
                      proposant des prix démocratiques, abus de la part d'un directeur ou d'un enseignant, discrimination,
                      ...

                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Informer les étudiants</h4>
                    <h4 class="subheading"> </h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted"> Cette mission se concrétise à deux niveaux différents: en premier lieu, il est
                      important de communiquer et d'informer les étudiants par rapport à ce qu'il se passe dans
                      l'établissement et dans le Conseil étudiant. En second lieu, il faut également informer et
                      sensibiliser les étudiants quant à leurs droits et à la manière de les défendre (au sein de
                      l'établissement ou au niveau communautaire). La FEF propose plusieurs outils (publications,
                      campagnes, ...) pour aider les Conseil étudiants dans cette tâche et stimuler les initiatives.
                  </div>
                </div>
              </li>
          </div>
        </div>
    </section>

    <section class="page-section" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Nous contacter</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            {!! Form::open(['url' => 'contact']) !!}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                  {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
                  {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
                  {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre prénom']) !!}
                  {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
                  {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group  {!! $errors->has('texte') ? 'has-error' : '' !!}">
                  {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
                  {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-primary btn-xl text-uppercase']) !!}
                {!! Form::close() !!}
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy;CHE²</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Politique de confidantialitée</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Condition d'utilisation</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script src="{{ asset('/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('/js/agency.min.js') }}"></script>

  </body>

</html>
