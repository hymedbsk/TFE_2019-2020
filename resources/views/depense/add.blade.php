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
				                <h3> Ajouter une dépense </h3>
                            </p>
                        </div>
                         <div class="card-body">
                            {!! Form::open(['route' => 'depense.store','enctype'=>'multipart/form-data']) !!}
				            @csrf
             				<div class="form-group ">
                                 <div class="form-group  {!! $errors->has('qte') ? 'has-error' : '' !!}">
                                    <div class ="row">
                                        <div class="col-md-4">
                                            {!! Form::number('qte', null, ['class' => 'form-control border-primary', 'placeholder' => 'Dépense', 'maxlength' => '6','min'=>'0']) !!}
                                            {!! $errors->first('qte', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                 </div>
                            </div>

                            <div class="form-group  ">
                                <div class ="row">
                                <div class="col-md-12">
                                    <div class="form-group  {!! $errors->has('Description') ? 'has-error' : '' !!}">
                                        {!! Form::textarea('description', null, ['class' => 'form-control border border-primary','maxlength' => '100', 'placeholder' => 'Petite description de la dépense' ]) !!}
                                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
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
