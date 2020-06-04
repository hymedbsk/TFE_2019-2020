@extends('layouts.log')

@section('content')

<header class="masthead">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">


                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <p class="text-center"> <img class="img-fluid-center"
                                        src="{{ asset('img/che2head.png') }}" alt="Logo CHE2"></p>
                                <h2> Vos informations personnelles </h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nom" class=" col-form-label text-md-right">Nom</label>


                                    <input id="nom" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="nom"
                                        value="<?php echo Auth::user()->nom ?>" readonly>


                                </div>
                                <div class="form-group">
                                    <label for="prenom" class=" col-form-label text-md-right">Prénom</label>


                                    <input id="prenom" type="prenom"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        value="<?php echo Auth::user()->prenom ?>" readonly>


                                </div>
                                <div class="form-group">
                                    <label for="email"
                                        class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="<?php echo Auth::user()->email ?>" autocomplete="email autofocus"
                                        readonly>


                                </div>

                                <div class="form-group ">
                                    <label for="name" class=" col-form-label text-md-right strong"> Matricule </label>


                                    <input id="pseudo" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="pseudo"
                                        value="<?php echo Auth::user()->matricule ?>" autocomplete="name" autofocus
                                        readonly>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <form method="POST" action="{{ route('change.password') }}">
                                    @csrf

                                    @foreach($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach

                                    <div class="form-group ">
                                        <label for="password" class=" col-form-label text-md-right">Mot de passe
                                            actuel</label>


                                        <input id="password" type="password" class="form-control"
                                            name="current_password" autocomplete="current-password">
                                    </div>


                                    <div class="form-group ">
                                        <label for="password" class="ccol-form-label text-md-right">Nouveau mot de
                                            passe</label>


                                        <input id="new_password" type="password" class="form-control"
                                            name="new_password" autocomplete="current-password">

                                    </div>

                                    <div class="form-group ">
                                        <label for="password" class=" col-form-label text-md-right">Confirmer le nouveau
                                            mot de passe</label>


                                        <input id="new_confirm_password" type="password" class="form-control"
                                            name="new_confirm_password" autocomplete="current-password">

                                    </div>

                                    <div class="form-group float-left row">

                                        <p> <a class="btn btn-danger" href="compte/{{ Auth::user()->User_id }}">
                                                Supprimer son compte </a></p>

                                        <br />
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12">
                                            @include('message')
                                        </div>
                                        ²
                                    </div>
                                    <div class="col-md-8 offset-md-2">

                                        <button type="submit" class="btn btn-primary">
                                            Mettre à jour le mot de passe
                                        </button>
                                    </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
