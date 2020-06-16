@extends('layouts.log')

@section('content')
<section class="page-section">
  <div class="intro-text">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <p>
                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                <h3 class="panel-title">Liste des utilisateurs</h3>
                @include('message')

              </p>

              @if(session()->has('ok'))
                <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
              @endif
            </div>
            <div class="card-body">
              {!! $links !!}
              <input class="form-control" id="myInput" type="text" placeholder="Recherche...">
              <script>
                $(document).ready(function () {
                  $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myList ").filter(function () {
                      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                  });
                });
              </script>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th class="scope">Matricule</th>
                    <th class="scope">Email</th>
                    <th class="scope">Nom</th>
                    <th class="scope">Prénom</th>
                    <th></th>
                    <th>
                      <a class=" btn btn-success" href="{{ url('admin') }}"> Gérer les admins </a>
                    </th>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      @if($user->compte_check == 1)
                        <tr id="myList">
                          <td class="text-primary"><strong>{!! $user->matricule !!}</strong></td>
                          <td class="text-primary"><strong>{!! $user->email !!}</strong></td>
                          <td class="text-primary"><strong>{!! $user->nom !!}</strong></td>
                          <td class="text-primary"><strong>{!! $user->prenom !!}</strong></td>
                          <td>{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning
                            btn-block']) !!}</td>
                          <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return
                            confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
                            {!! Form::close() !!} </td>
                          <td>

                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            {!! link_to_route('user.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection