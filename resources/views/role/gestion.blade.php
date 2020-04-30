@extends('layouts.post')

@section('content')
<header class="masthead">
    <div class="intro-text">
      <div class="container-fluid">
          <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card">
                   <div class="card-header">
                        <h3 class="panel-title">Gestion des rôles </h3>
                        <p>
                         <img src="{{ asset('/img/che2Head.png')}}" alt="logo che2">
                        </p>
                        <p class=" alert alert-danger"> Le rôle "Super Admin" ne peut être attribué qu'à Hymed Boussaklatan</p>
                        <p> @include('message') </p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                          <thead>
                            {!! $links !!}
                                <th class="scope">Prénom</th>
                                <th class="scope">Nom</th>
                                <th class="scope">Rôles</th>
                                <th class="scope"></th>
                                <th class="scope"></th>
                                <th class="scope"></th>
                                <th class="scope"> <a href="{{ url('role/gestion') }}" class="btn btn-info"> Gérer les rôles </a></th>
                          </thead>
                          <tbody>
                                @foreach ($users as $user)
                                    @if($user->membre==0)
                                        <tr>
                                            <td class="text-primary"><strong>{!! $user->prenom !!}</strong></td>
                                            <td class="text-primary"><strong>{!! $user->nom !!}</strong></td>
                                            <td class="text-primary"><strong>
                                                @foreach ($user->roles as $role)
                                                    {!! $role->nom  !!}
                                                @endforeach
                                            </td>
                                            <td class="text-primary"><strong>
                                            <td class="text-primary"><strong>
                                            <td class="text-primary"><strong>
                                                <div class="form-group ">
                                                    <div class ="row">
                                                        <div class="col-md-12">
                                                            {!! Form::open(['method' => 'PUT', 'route' => ['role.change', $user->User_id]]) !!}
                                                            <select name='role' class=" form-control ">
                                                                @foreach ($roles as $role)
                                                                <option value="{{$role->Role_id}}">{{$role->nom }}</option>
                                                                @endforeach
                                                            </select>
                                                            <br>
                                                            {!! Form::submit('Attribuer un rôle', ['class' => ' form-group btn btn-success btn-block']) !!}
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['role.delete', $user->User_id]]) !!}
                                                {!! Form::submit('Supprimer le(s) rôle(s)', ['class' => 'btn btn-danger btn-block']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            </div>
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
  </header>
@endsection
