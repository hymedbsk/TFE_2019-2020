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
                             <h3 class="panel-title text-left" style="color:black"> <a href="{{url('document')}}" class="" style="color:black"> Documents</a>  &nbsp >  &nbsp @foreach($docs as $doc){{$doc->nom}} @endforeach </h3>
                        </p>
                        <p> @include('message') </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @foreach($docs as $doc)
                            <table class="table table-hover">
                                <thead>
                                    <th class="scope"> <a class="float-left" href= "{{ url('document/'.Crypt::encrypt($id).'/file') }}" style="color:white"> <i class="fas fa-plus-circle fa-3x" style="color:green"></i> </a></th>
                                    <th class="scope"> </th>
                                    <th class="scope text-left"> Nom </th>
                                    <th class="scope text-left"> Ajouter le  </th>
                                    <th class="scope text-left"> Ajouter par </th>
                                </thead>
                                    <tbody>
                                           @foreach($doc->files as $file)
                                                <tr>
                                                    <td><a class="card-text" href="{{ url('downloads/'.$file->file_nom) }} " style="color:white"> <i class="fas fa-download" style="color:#fed136"></i></a>  </td>
                                                    <td>  <a class="float-left" href="{{ url('file/'.$file->file_id) }} " style="color:white" onclick="confirm(\'Voulez-vous vraimer supprimer ce fichier ?\')"> <i class="fas fa-trash" style="color:red"></i></a>  </td>
                                                    <td class="text-left"><a class="file" href={{ url('download/'.$file->file_nom )}} ><i class="far fa-file-alt"></i> {{$file->file_nom}}</a></td>
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
