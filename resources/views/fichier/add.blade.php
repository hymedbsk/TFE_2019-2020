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
                                <h3> Ajouter un document </h3>
                            </p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'file.store','enctype'=>'multipart/form-data']) !!}
                            @csrf
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-12">

                                        <select name='doc' class=" form-control border-primary">
                                            @foreach($docs as $doc)
                                                <option value="{{ $doc->doc_id }} " @if(Crypt::decrypt($id)==$doc->
                                                    doc_id) selected @endif> {{ $doc->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::file('Nom_doc[]', ['class' => 'form-control-file border-primary btn
                                        btn-info','multiple']) !!}
                                        {!! $errors->first('Nom_doc', '<small class="help-block">:message</small>') !!}
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
    </div>
</section>
@endsection