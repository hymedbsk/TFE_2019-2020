@extends('layouts.post')

@section('content')

<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                       <h2 class="intro-home"> Bienvenu sur l'interface du CHE²</h2>
                        <p class="intro-home"> tu peux voir et télécharger tout les documents ajouter par les autres étudiants  sur la <a href={{ url('/post')}}> plateforme, </a>  </p>
                        <p class="intro-home"> Ou alors tu peux toi aussi ajouter tout tes documents utils <p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
