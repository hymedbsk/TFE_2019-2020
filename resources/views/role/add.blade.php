@extends('layouts.log')

@section('content')
<section class="page-section">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <p>
                                <h3> Ajouter un rôle </h3>
                                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                            </p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'role.store']) !!}
                            @csrf
                            <div class="form-group  {!! $errors->has('Titre') ? 'has-error' : '' !!}">
                                <div class="col-md-12">
                                    {!! Form::text('nom', null, ['class' => 'form-control border-primary', 'placeholder'
                                    => 'Nom du rôle', 'maxlength' => '20', 'required']) !!}
                                    {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                {!! Form::submit('Créer !', ['class' => 'btn btn-info pull-right']) !!}
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
    </div>
</section>
@endsection