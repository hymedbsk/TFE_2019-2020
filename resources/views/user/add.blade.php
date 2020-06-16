@extends('layouts.log')

@section('content')

<section class="page-section">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">

                            <p> <img src="{{ asset('/img/CHE2-150x75.png') }}" alt="logo che2">
                            </p>

                            <div class="card-body">
                                <form method="POST" action="{{ route('user.store') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="matricule"
                                            class="col-md-4 col-form-label text-md-right">Matricule</label>

                                        <div class="col-md-6">
                                            <input id="matricule" type="text"
                                                class="form-control @error('matricule') is-invalid @enderror"
                                                name="matricule" value="{{ old('matricule') }}"
                                                required autocomplete="matricule" autofocus maxlength="8"
                                                style="text-transform:uppercase">

                                            @error('matricule')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>

                                        <div class="col-md-6">
                                            <input id="nom" type="text"
                                                class="form-control @error('nom') is-invalid @enderror" name="nom"
                                                value="{{ old('nom') }}" required autocomplete="nom"
                                                autofocus>

                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="prenom" class="col-md-4 col-form-label text-md-right">Prénom</label>

                                        <div class="col-md-6">
                                            <input id="prenom" type="text"
                                                class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                                value="{{ old('prenom') }}" required
                                                autocomplete="nom" autofocus>

                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Adresse
                                            Mail</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required
                                                autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Mot de
                                            passe</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">Confirmer le mot de
                                            passe</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-3">
                                            <button type="submit" class="btn btn-primary">
                                                Ajouter l'utilisateur
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
</section>

@endsection