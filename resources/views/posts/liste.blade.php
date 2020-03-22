@extends('layouts.post')

@section('content')





  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                {!! $links !!}
	        @foreach($posts as $post)
              <h5 class="card-title">{{ $post->Titre }}</h5>
              <p class="card-text">{{ $post->Description }}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
      </div>
      @endforeach

    </div>
  </section>

@endsection
