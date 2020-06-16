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
                                <img src="{{ asset('/img/che2Head.png') }}" alt="logo che2">
                                <h3 class="panel-title "> Modifier l'annonce</h3>
                            </p>
                            <p> @include('message') </p>
                        </div>
                        <div class="card-body">
                            {!! Form::model($annonce,['route' => ['annonce.update', $annonce->annonce_id], 'method' =>
                            'put', 'class' => 'form-horizontal panel', 'enctype'=>'multipart/form-data']) !!}
                            @csrf
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::text('titre', $annonce->titre, ['class' => 'form-control
                                        border-primary', 'placeholder' => 'Titre de l\'annonce', 'min'=>'10',
                                        'maxlength' => '100']) !!}
                                        {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                                        <br />
                                    </div>
                                    <br />
                                    <div class="col-md-12">
                                        {!! Form::textarea('contenu', $annonce->contenu,['class' => 'form-control
                                        border-primary', 'placeholder' => 'Contenu', 'min'=>'10', 'maxlength'=>"100"])
                                        !!}
                                        {!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                {!! Form::submit('Modifier l\'annonce !', ['class' => 'btn btn-info ']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <a href="javascript:history.back()" class="btn btn-primary" data-dismiss="modal">
                            <span class="glyphicon glyphicon-circle-arrow-left"> Retour</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </header>



    @endsection