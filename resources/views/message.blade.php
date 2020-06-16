@if(Session::has('message'))
        <div class="alert alert-success" style="font-size:20px">
        	{{ Session::get('message') }}
        </div>
@endif

@if(session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
    </div>
@endif
