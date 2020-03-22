@extends('layouts.post')

@section('content')
<section class="page-section" id="services">
    <div class="container">
      <div class="row">
            <div class="panel-heading">Ajout d'un article</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'post.store']) !!}
                    <div class="form-group {!! $errors->has('Titre') ? 'has-error' : '' !!}">
                        {!! Form::text('Titre', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                        {!! $errors->first('Titre', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
                        {!! Form::textarea ('Description', null, ['class' => 'form-control', 'placeholder' => 'Contenu']) !!}
                        {!! $errors->first('Description', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection
