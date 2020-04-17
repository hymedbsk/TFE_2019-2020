@extends('layouts.post')

@section('content')
<section class="masthead" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
            @if(session()->has('ok'))
                <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
            @endif
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2> Liste des utilisateurs </h2>
                </div>
                <div class="card">
                    <div class="card-header">
                       <p class="text-center"> <img class="img-fluid-center" src="{{ asset('img/che2head.png') }}" alt="Logo CHE2"></p>
                    </div>
                    <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-warning">Matricule</th>
                            <th class="text-warning">Nom</th>
                            <th class="text-warning">Prénom</th>
                            <th class="text-warning">E-mail</th>
                            <th class="text-warning"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class=""><strong>{!! $user->matricule !!}</strong></td>
                                <td class=""><strong>{!! $user->nom !!}</strong></td>
                                <td class=""><strong>{!! $user->prenom !!}</strong></td>
                                <td class=""><strong>{!! $user->email !!}</strong></td>
                                <td>{!! link_to_route('user.edit', 'Modifier', [$user->User_id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->User_id]]) !!}
                                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                </table>

            {!! link_to_route('user.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']) !!}
            {!! $links !!}
        </div>
        </div>
        </div>
    </div>
</div>
</div>


</section>

@endsection
