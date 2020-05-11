@extends('layouts.auth')

@section('content')


<header class="masthead">
    <div class="intro-text">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
		
			  <p>  <img src="{{ asset('/img/CHE2-500x250.png') }}" alt="logo che2"></p>
		<h5>	{{ __('Vérifiez votre adresse email,') }}</h5>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           <h5> {{ __('Un nouveau lien de vérification a été envoyé à votre adresse email.') }}</h5>
                        </div>
                    @endif

                  <h5>  {{ __('avant de continuer, veuillez vérifier votre courrier électronique pour un lien de vérification.') }}
                    {{ __("Si vous n'avez pas reçu l'email") }}, <a style="color:blue"href="{{ route('verification.resend') }}">{{ __('cliquer ici pour faire une autre demande') }}</a>.</h5>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</header>
@endsection
