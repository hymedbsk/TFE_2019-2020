@extends('layouts.log')

@section('content')

<header class="masthead">

      <div class="intro-text">
	<div class="container">
        <div class="table-responsive">
            <iframe src={{url("storage/".$file)}} frameborder="0" style="width:100%;min-height:900px;"></iframe>
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












