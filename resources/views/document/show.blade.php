@extends('layouts.post')

@section('content')
<header class="masthead">
    <div class="intro-text">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                        <p>
                            <img src="{{ asset('/img/che2Head.png')}}" alt="logo che2">
                             <h3 class="panel-title"> {{ $id}}</h3>
                        </p>

                        <p> @include('message') </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @foreach($docs as $doc)
                            <table class="table table-hover">
                                <thead>
                                    <th class="scope"> <a class="btn btn-success" href= "{{ url('document/'.$id.'/file') }}" style="color:white"> Ajouter un fichier </a></th>
                                    <th class="scope text-left"> Nom </th>
                                    <th class="scope text-left"> Ajouter le  </th>
                                    <th class="scope text-left"> Ajouter par </th>
                                    <th class="scope"> </th>
                                    <th class="scope"> </th>
                                </thead>

                                    <tbody>

                                           @foreach($doc->files as $file)
                                                <tr>
                                                    <td> </td>
                                                    <td class="text-left"><a class="file" href="#" download><i class="far fa-file-alt"></i> {{$file->file_nom}}</a></td>
                                                    <td class="text-left"> {!! $file->ajoute_le->format('d-m-Y') !!}</td>
                                                    <td class="text-left"> {!! $file->user->prenom !!} {!! $file->user->nom !!}</td>
                                                </tr>
                                           @endforeach

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
