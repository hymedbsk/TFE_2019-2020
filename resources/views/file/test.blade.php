@extends('layouts.log')

@section('content')

<header class="masthead">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title"><i  style="color:#fed136" class="fas fa-coins fa-4x"></i></h5>
                                <p class="card-text"><strong>Trésorie</p></strong>
                                <a class="card-text"></a>
                                <a class="card-text"></a>
                                <p class="sub-card">  </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <a href="{{url('/user')}}">
                                <h5 class="card-title"><i style="color:#fed136" class="fas fa-users fa-4x"></i></h5>
                                <p class="card-text"><strong>Gestion des utilisateurs</p></strong>
                                <a class="card-text"></a>
                                <a class="card-text"></a>
                                <p class="sub-card">  </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <a href="{{url('/admin')}}">
                                <h5 class="card-title"><i style="color:#fed136" class="fas fa-users-cog fa-4x"></i></h5>
                                <p class="card-text"><strong> Gestion des membres</p></strong>
                                <a class="card-text"></a>
                                <a class="card-text"></a>
                                <p class="sub-card">  </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <a href="{{url('/verification')}}">
                                <h5 class="card-title"><i style="color:#fed136"class="fas fa-user-check fa-4x"></i></h5>
                                <p class="card-text"><strong>Vérifier les inscriptions</p></strong>
                                <a class="card-text"></a>
                                <a class="card-text"></a>
                                <p class="sub-card">  </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <a href="{{url('/sharepoint')}}">
                                <h5 class="card-title"><i style="color:#fed136"class="fas fa-folder-open fa-4x"></i></h5>
                                <p class="card-text"><strong>Partage de document</p></strong>
                                <a class="card-text"></a>
                                <a class="card-text"></a>
                                <p class="sub-card">  </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <a href="{{url('/role')}}">
                                <h5 class="card-title"><i style="color:#fed136"class="fas fa-user-tag fa-4x"></i></h5>
                                <p class="card-text"><strong>Gestion des rôles</p></strong>
                                <a class="card-text"></a>
                                <a class="card-text"></a>
                                <p class="sub-card">  </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
