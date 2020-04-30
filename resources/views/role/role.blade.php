@extends('layouts.post')

@section('content')
<header class="masthead">
    <div class="intro-text">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card">
                   <div class="card-header">
                        <h3 class="panel-title">Liste des rôles </h3>
                        <p>
                            <img src="{{ asset('/img/che2Head.png')}}" alt="logo che2">
                        </p>
                        <p>
                            @include('message')
                        </p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>

                                <th class="scope">Rôle</th>
                                <th class="scope"></th>
                                <th class="scope"> <a href="{{ url('role/gestion/create') }}" class="btn btn-info"> Créer un rôle </a></th>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-primary"><strong>{!! $role->nom !!}</strong></td>
                                        <td class="text-primary"></td>
                                        <td>
                                            {!! Form::open([ 'method'=> 'DELETE',  'route' => ['role.destroy', $role->Role_id]]) !!}
                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce rôle  ?\')']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
      </div>
     </div>
    </div>
  </header>

@endsection
