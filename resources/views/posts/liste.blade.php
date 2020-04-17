@extends('layouts.post')

@section('content')

  <section class="masthead">
    <div class="container">

      <div class="row">
        {!! Form::open(['route' => 'post.search']) !!}
        <div class="form-group ">
                <div class="col-md-12">
                    <select name='Option_Nom' class=" form-control border-info">
                        <option value="IT">Technologie de l'informatique</option>
                        <option value="CX">Commerce Extérieur</option>
                        <option value="CO">Comptabilité</option>
                        <option value="DT">Droit</option>
                        <option value="EB">e-Business</option>
                        <option value="EM">Électromécanique</option>
                        <option value="MA">Marketing</option>
                        <option value="AU">Automatique</option>
                    </select>
                </div>
                <div class="col-md-5">
                <select name='Bac' class=" form-control border-info">
                    <option value="1">Bac 1</option>
                    <option value="2">Bac 2</option>
                    <option value="3">Bac 3</option>
                </select>
                </div>
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
        </div>

        {!! Form::close() !!}

        <a href="{{ url('post/?Option_Nom=IT') }}"> TI </a>
        <div class="container">
            {!! $links !!}
            <div class="row">
        @foreach($posts as $post)

        <div class="col-md-6 ">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
              <h5 class="card-title">{{ $post->Titre }}</h5>
              <p class="card-text">{{ $post->Description }}</p>
              <a class="card-text" href="{{ url('download/'.$post->Nom_doc) }}"> {{ $post->Nom_doc}} </a>
              <p class="sub-card"> {{ $post->user->prenom }} le {!! $post->Date->format('d-m-Y') !!} </p>
              <a href="{{ url('/post/'.$post->Post_id. '/edit')}}" class="btn btn-warning float-left"> Modifier </a>

            </div>
          </div>
      </div>
      @endforeach
      </div>
    </div>

</div>
  </section>

@endsection
