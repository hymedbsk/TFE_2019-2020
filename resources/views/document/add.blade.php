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

                                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                                <h3> Créer un dossier </h3>
                            </p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'doc.store']) !!}
                            @csrf
                            <div class="form-group  {!! $errors->has('Titre') ? 'has-error' : '' !!}">
                                <div class="col-md-12">
                                    {!! Form::text('nom', null, ['class' => 'form-control border-primary', 'placeholder'
                                    => 'Nom du dossier', 'maxlength' => '30']) !!}
                                    {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
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
    </div>
</section>
@endsection