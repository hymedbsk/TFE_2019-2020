@extends('layouts.post')

@section('content')
<header class="masthead">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <p>
                                <img src="{{ asset('/img/che2Head.png') }}" alt="logo che2">
                            </p>
                        </div>
                         <div class="card-body">
                            {!! Form::open(['route' => 'post.store','enctype'=>'multipart/form-data']) !!}
                            <div class="form-group ">
                                    <div class="col-md-12">
                                        <div class="form-group  {!! $errors->has('Titre') ? 'has-error' : '' !!}">
                                        {!! Form::text('Titre', null, ['class' => 'form-control rounded-pill border border-info', 'placeholder' => 'Cours (ex: Anglais Q1)']) !!}
                                        {!! $errors->first('Titre', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group ">
                                <div class ="row">
                                    <div class="col-md-6">
                                        <select name='Option_Nom' class=" form-control border-info">
                                            <option value="IT">Technologie de l'informatique</option>
                                            <option value="CX">Commerce Extérieur</option>
                                            <option value="CO">Comptabilité</option>
                                            <option value="DT">Droit</option>
                                            <option value="EB">e-Business</option>
                                            <option value="EM">Électromécanique</option>
                                            <option value="MA">Marketing</option>
                                            <option value="AU">Automatique</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                    <select name='Bac' class=" form-control border-info">
                                        <option value="1">Bac 1</option>
                                        <option value="2">Bac 2</option>
                                        <option value="3">Bac 3</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class ="row">
                            {!! Form::file('Nom_doc', ['class' => 'form-control'] ) !!}
						{!! $errors->first('Nom_doc', '<small class="help-block">:message</small>') !!}
					</div>

                </div>
            </div>
                            <div class="form-group  ">
                                <div class="col-md-12">
                                    <div class="form-group  {!! $errors->has('Description') ? 'has-error' : '' !!}">
                                        {!! Form::textarea ('Description', null, ['class' => 'form-control border border-info', 'placeholder' => 'Description (ex: Synthèse bien sympa qui vous permettra de peut-être réussir le cours d\'anglais ) ']) !!}
                                        {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                                {!! Form::close() !!}
                            </div>
                            </div>
                        </div>
        <!--<a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a> -->
    </div>
</div>
</header>
@endsection
