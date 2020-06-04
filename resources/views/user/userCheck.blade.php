@extends('layouts.log')

@section('content')


<header class="masthead">
    <div class="intro-text">
        <div class="container">
            @if(session()->has('ok'))
                <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <p> <img src="{{ asset('/img/che2head.png') }}" alt="logo che2"></p>
                            <h3> Approuver les inscriptions </h3>
                        </div>

                        <div class="card-body">
                            {{ $users->links() }}
                            <div class="table-responsive">
                                <table class="table">
                                    <div class="table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>email</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach($users as $user)
                                                @if($user->compte_check==0)

                                                    <tr>

                                                        <td class="text-primary"><strong>{!! $user->matricule
                                                                !!}</strong></td>
                                                        <td class="text-primary"><strong>{!! $user->nom !!}</strong>
                                                        </td>
                                                        <td class="text-primary"><strong>{!! $user->email !!}</strong>
                                                        </td>
                                                        <td>
                                                            {!! Form::open(['method' => 'put', 'route' => ['user.check',
                                                            $user->id]]) !!}
                                                            {!! Form::submit('Approuver', ['class' => 'btn btn-success
                                                            btn-block', 'onclick' => 'return confirm(\'Voulez-vous
                                                            raiment approuver cet utilisateur ?\')']) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                        <td>
                                                            {!! Form::open(['method' => 'DELETE', 'route' =>
                                                            ['user.destroy', $user->id]]) !!}
                                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger
                                                            btn-block', 'onclick' => 'return confirm(\'Vraiment
                                                            supprimer cet utilisateur ?\')']) !!}
                                                            {!! Form::close() !!}
                                                        </td>

                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
@endsection
