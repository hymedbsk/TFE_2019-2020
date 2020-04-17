@extends('layouts.post')

@section('content')
<section class="masthead" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
			 <h2 class="panel-title">Modification d'un utilisateur</h2>

             <div class="card">
                <div class="card-header">
                   <p class="text-center"> <img class="img-fluid-center" src="{{ asset('img/che2head.png') }}" alt="Logo CHE2"></p>
                </div>
                <div class="card-body">
					{!! Form::model($user, ['route' => ['user.update', $user->User_id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
					  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
                        {!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prenom']) !!}
                        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
                  </div>
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
					  	{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
					  	{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>

							</label>
						</div>
					</div>
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>

		<a href="javascript:history.back()" class="btn btn-info">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
    </div>
</div>
</div>
</div>


</section>
@endsection
