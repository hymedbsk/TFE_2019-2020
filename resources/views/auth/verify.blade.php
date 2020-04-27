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
			{{ __('Verify Your Email Address') }}

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</header>
@endsection
