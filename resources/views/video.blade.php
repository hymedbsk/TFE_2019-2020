@extends('layouts.log')

@section('content')

<header class="masthead">

      <div class="intro-text">
	<div class="container">
        <div class="table-responsive">
            <video width="600" height="400" controls>
                <source src="{{url("/storage/".$file)}}" type="video/mp4">
              Your browser does not support the video tag.
              Votre navigateur ne supporte pas le lecteur vidéo.
          </video>
          </div>
      </div>
    </div>
</header>
<section class=" page-section" id="portfolio">
    <div class="container">
    </div>
</section>
<footer class="footer">
    <div class="container">
    </div>
</footer>
@endsection
