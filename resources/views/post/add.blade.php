@extends('layouts.log')

@section('content')
<header class="masthead">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card shadow p-3 mb-5 bg-white rounded">

                        <div class="card-header">
                            <p>
                                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
				<h3> Ajouter un post </h3>
                            </p>
			   <p class="alert alert-danger"> 
				Il est interdit de partager des examens ou interrogations.
				Chaque post sera approuvé par un administrateur.
			  </p>
                        </div>
                         <div class="card-body">
                            {!! Form::open(['route' => 'post.store','enctype'=>'multipart/form-data']) !!}
				@csrf
             				<div class="form-group ">

                                        <div class="form-group  {!! $errors->has('Titre') ? 'has-error' : '' !!}">
                                            <div class ="row">
					                    <div class="col-md-12">
                                        {!! Form::text('Titre', null, ['class' => 'form-control border-primary', 'placeholder' => 'Cours (ex: Anglais Q1)', 'maxlength' => '100']) !!}
                                        {!! $errors->first('Titre', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>
                                </div>

                            <div class="form-group ">
                                <div class ="row">
                                    <div class="col-md-6">
                                        <select name='Option_Nom' class=" form-control border-primary">
                                            <option value="Technologie de l'informatique">Technologie de l'informatique</option>
                                            <option value="Commerce Extérieur">Commerce Extérieur</option>
                                            <option value="Comptabilité">Comptabilité</option>
                                            <option value="Droit">Droit</option>
                                            <option value="e-Business">e-Business</option>
                                            <option value="Electromécanique">Electromécanique</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Automatique">Automatique</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                    <select name='Bac' class=" form-control border-primary">
                                        <option value="1">Bac 1</option>
                                        <option value="2">Bac 2</option>
                                        <option value="3">Bac 3</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class ="row">
				                <div class="col-md-12">
			     <p> Max 10MB</p>
                            {!! Form::file('Nom_doc', ['class' => 'form-control-file border-primary btn  btn-info'] ) !!}
			    {!! $errors->first('Nom_doc', '<small class="help-block">:message</small>') !!}
					</div>
				    </div>
               			 </div>

                            <div class="form-group  ">
                                <div class ="row">
                                <div class="col-md-12">
                                    <div class="form-group  {!! $errors->has('Description') ? 'has-error' : '' !!}">
                                        {!! Form::textarea ('Description', null, ['class' => 'form-control border border-primary','maxlength' => '200', 'placeholder' => 'Description (ex: Synthèse bien sympa qui vous permettra de peut-être réussir le cours d\'anglais ) ', ]) !!}
                                        {!! $errors->first('Description', '<small class="help-block">:message</small>') !!}
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            </div>
                                    <div class="col-md-12 text-center">
                                        {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                                        {!! Form::close() !!}
                                    </div>


                            </div>
                            <a href="javascript:history.back()" class="btn btn-primary">
                                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                            </a>
                        </div>
                    </div>
    </div>
</div>
</header>
@endsection

