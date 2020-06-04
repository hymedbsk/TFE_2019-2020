@extends('layouts.log')

@section('content')
<header class="masthead">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <p>
                                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                                <h3> Créer un budget</h3>
                            </p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => ['budget.store'],'enctype'=>'multipart/form-data']) !!}
                            @csrf
                            <div class="form-group ">
                                <div class="form-group  {!! $errors->has('qte') ? 'has-error' : '' !!}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::text('nom', null, ['class' => 'form-control border-primary',
                                            'placeholder' => 'Nom du budget', 'maxlength' => '15']) !!}
                                            {!! $errors->first('montant', '<small class="help-block">:message</small>')
                                            !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::text('annee', '2019/2020', ['class' => 'form-control
                                            border-primary', 'placeholder' => 'année/année', 'min'=>'9', 'max'=>'9',
                                            'maxlength'=>"9"]) !!}
                                            {!! $errors->first('annee', '<small class="help-block">:message</small>')
                                            !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::number('total', null, ['class' => 'form-control border-primary',
                                        'placeholder' => 'Montant du budget', 'maxlength' => '7','min'=>'0']) !!}
                                        {!! $errors->first('total', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                {!! Form::submit('Enregister le budget !', ['class' => 'btn btn-info pull-right']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <a href="javascript:history.back()" class="btn btn-primary">
                            <span class="glyphicon glyphicon-circle-arrow-left"> Retour</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
