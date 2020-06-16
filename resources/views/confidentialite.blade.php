@extends('layouts.log')

@section('content')
<header class="masthead">
  <div class="container">
    <div class="intro-text">

    </div>
  </div>
</header>

<div class="container">
  <div class="col-md-12">
    <div class="card shadow p-3 mb-5 bg-white rounded">
      <div class="header">
        <img src="{{ asset('/img/che2head.png') }}" alt="logo du CHE2">
        <h2>Politique de confidentialité</h2>
      </div>
      <div class="card-body">


        <h3><strong>Introduction</h3>
        <br>Devant le développement des nouveaux outils de communication, il est nécessaire de porter une attention
        particulière à la protection de la vie privée.
        C'est pourquoi, nous nous engageons à respecter la confidentialité des renseignements personnels que nous
        collectons.</p>
        <hr>

        <h3>Collecte des renseignements personnels</h3>

        <p>Nous collectons les renseignements suivants : </p>
        <ul>
          <li>Matricule</li>
          <li>Nom</li>
          <li>Prénom</li>
          <li>Adresse électronique</li>
        </ul>
        <p>Les renseignements personnels que nous collectons sont recueillis au travers de formulaires et grâce à
          l'interactivité établie entre vous et notre site Web.
          Nous utilisons également, comme indiqué dans la section suivante, des fichiers témoins et/ou journaux pour
          réunir des informations vous concernant.</p>
        <hr>

        <h3>Formulaires et interactivité :</h3>

        <p>Vos renseignements personnels sont collectés par le biais de formulaire, à savoir :</p>
        <ul>
          <li>Formulaire d'inscription au site Web</li>
        </ul>
        <p>Nous utilisons les renseignements ainsi collectés pour les finalités suivantes :</p>
        <ul>
          <li>Contact</li>
          <li>Gestion du site Web (présentation, organisation)</li>
          <li>Publication de post sur la plateforme</li>

        </ul>
        <p>Vos renseignements sont également collectés par le biais de l'interactivité pouvant s'établir entre vous et
          notre site Web et ce, de la façon suivante :</p>
        <ul>
          <li>Contact</li>
          <li>Gestion du site Web (présentation, organisation)</li>
          <li>Publication de post sur la plateforme</li>
        </ul>
        <p style="color:red; font-size: 20px;">Vos renseignements pourront également être modifiées si vous le demandez
        </p>

        <p>Nous utilisons les renseignements ainsi collectés pour les finalités suivantes :<br /></p>
        <ul>
          <li>Forum ou formulaire de discussion</li>
          <li>Informations</li>
        </ul>
        <hr>

        <h3>Fichiers journaux et témoins </h3>

        <p>Nous recueillons certaines informations par le biais de fichiers journaux (log file) et de fichiers témoins
          (cookies). Il s'agit principalement des informations suivantes :</p>
        <ul>
          <li>Adresse IP</li>
          <li>Pages visitées et requêtes</li>
          <li>Heure et jour de connexion</li>
        </ul>
        <p>Le recours à de tels fichiers nous permet : </p>
        <ul>
          <li>Amélioration du service et accueil personnalisé</li>
        </ul>
        <hr>

        <h3>Droit d'opposition et de retrait</h3>

        <p>Nous nous engageons à vous offrir un droit d'opposition et de retrait quant à vos renseignements personnels.
          <br>Le droit d'opposition s'entend comme étant la possiblité offerte aux internautes de refuser que leurs
          renseignements personnels soient utilisées à certaines fins mentionnées lors de la collecte.</p>
        <p>Le droit de retrait s'entend comme étant la possiblité offerte aux internautes de demander à ce que leurs
          renseignements personnels ne figurent plus, par exemple, dans une liste de diffusion.</p>
        <p>Pour pouvoir exercer ces droits, vous pouvez :</p>
        <ul>
          <li>Code postal : Avenue Konrad Adenauer 3, 1200 Woluwe-Saint-Lambert, Belgique</li>
          <li>Courriel : <a href="mailto:che2@ephec.be">che2@ephec.be</a></li>
          <li>Section du site web : <a href="/#contact" target="_blank">wwww.che2-ephec.be/#contact</a></li>
        </ul>
        <hr>

        <h3>Droit d'accès</h3>

        <p>Nous nous engageons à reconnaître un droit d'accès et de rectification aux personnes concernées désireuses de
          consulter, modifier, voire radier les informations les concernant.</p>
        <p>L'exercice de ce droit se fera :</p>
        <ul>
          <li>Code postal : Avenue Konrad Adenauer 3, 1200 Woluwe-Saint-Lambert, Belgique</li>
          <li>Courriel : <a href="mailto:che2@ephec.be">che2@ephec.be</a></li>
          <li>Section du site web : <a href="/#contact" target="_blank">wwww.che2-ephec.be/#contact</a></li>
        </ul>
        <hr>

        <h2>Sécurité</h2>

        <p>Les renseignements personnels que nous collectons sont conservés dans un environnement sécurisé.
          <br>Les personnes travaillant pour nous sont tenues de respecter la confidentialité de vos informations.
          <br>Pour assurer la sécurité de vos renseignements personnels, nous avons recours aux mesures suivantes :</p>
        <ul>
          <li>Protocole SSL (Secure Sockets Layer)</li>
          <li>Gestion des accès - personne autorisée</li>
          <li>Gestion des accès - personne concernée</li>
          <li>Identifiant / mot de passe</li>
          <li>Pare-feu (Firewalls)</li>
        </ul>
        <p>Nous nous engageons à maintenir un haut degré de confidentialité en intégrant les dernières innovations
          technologiques permettant d'assurer la confidentialité de vos transactions.
          <br>Toutefois, comme aucun mécanisme n'offre une sécurité maximale, une part de risque est toujours présente
          lorsque l'on utilise Internet pour transmettre des renseignements personnels.</p>
        <hr>


      </div>
    </div>
  </div>
</div>
@endsection