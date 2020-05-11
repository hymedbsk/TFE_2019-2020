@extends('layouts.log')

@section('content')
<header class="masthead">
    <div class="intro-text">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card">
                   <div class="card-header">
                        <h3 class="panel-title">Attribution des rôles </h3>
                        <p>
                         <img src="{{ asset('/img/che2Head.png')}}" alt="logo che2">
                        </p>
                        <p> @include('message') </p>
                    </div>
                    <div class="card-body">
                        @foreach ($roles as $role)
                        <div class="col-md-12">
                            <p>{{ Form::radio('role', $role->Role_id)}} {{$role->nom }}</p>
                        </div>
                        @endforeach
                     </div>
                </div>
            </div>
      </div>
     </div>
    </div>
  </header>

@endsection

