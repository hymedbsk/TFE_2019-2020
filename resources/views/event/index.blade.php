@extends('layouts.log')

@section('content')
<section class="page-section">
    <div class="intro-text">
        <div class="container">
            <script>
                $('.date').datepicker({
                    autoclose: true,
                    dateFormat: "DD/MM/YYYY"
                });
                $('.fin').datepicker({
                    autoclose: true,
                    dateFormat: "yy-mm-dd"
                });
            </script>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">

                        <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                        <h2> Calendrier </h2>
                    </div>
                    <div class="card-body">
                        <p> <button type="button" class="btn btn-danger btn-lg float-center" data-toggle="modal"
                                data-target="#myModal">Ajouter un évènement</button>
                        </p><br>

                        <div id='calendar'></div>

                        <script src='{{ asset('js/locale-all.js') }}'></script>
                        <script>
                            $('#calendar').fullCalendar({
                                dragScroll: true,
                                events: [ <
                                    blade foreach | ( % 24 events % 20 as % 20 % 24 event) > {
                                        title: '{{ $event->titre }}',
                                        start: '{{ $event->début }}',
                                        end: '{{ $event->fin }}',
                                        url: "{{ url('event/'.Crypt::encrypt($event->event_id).'/show') }}",
                                        color: "{{ $event->color }}"
                                    }, <
                                    /blade endforeach>
                                ],
                                locale: 'fr',
                                selectable: true,
                                selectHelper: true,
                                select: function (start, end, allDay) {

                                    $("input#date").val(start.format());
                                    $("input#fin").val(end.format());

                                    $('#myModal2').modal('show');
                                },

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p style="text-align:center">
                    <h3> Créer un event</h3>
                </p>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'event.store','enctype'=>'multipart/form-data']) !!}
                @csrf
                <div class="form-group  {!! $errors->has('Titre') ? 'has-error' : '' !!}">
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Nom de
                            l\'event', 'maxlength' => '20']) !!}

                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::textarea('description', null, ['class' => 'form-control ', 'placeholder' =>
                            'Description de l\'event', 'maxlength' => '100']) !!}

                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            <select name='color' class=" form-control ">
                                <option style="background-color:Violet" value="Violet">Violet</option>
                                <option style="background-color:SlateGray" value="SlateGray">SlateGray</option>
                                <option style="background-color:SkyBlue" value="SkyBlue">SkyBlue</option>
                                <option style="background-color:SeaGreen" value="SeaGreen">SeaGreen</option>
                                <option style="background-color:Orchid" value="Orchid">Orchid</option>
                                <option style="background-color:Orange" value="Orange">Orange</option>
                                <option style="background-color:NavajoWhite" value="NavajoWhite">NavajoWhite</option>
                                <option style="background-color:MediumSeaGreen" value="MediumSeaGreen">MediumSeaGreen
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email" class=" col-form-label text-md-right">Date de début</label>
                            <input name="task_date" id="date" class="form-control" style="width: 100%; display: inline;"
                                onchange="invoicedue(event);" required="" type="date">
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="email" class=" col-form-label text-md-right">Date de fin</label>
                            <input name="task_end" id="fin" class="form-control" style="width: 100%; display: inline;"
                                onchange="invoicedue(event);" required="" type="date">

                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    {!! Form::submit('Créer !', ['class' => 'btn btn-success pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p style="text-align:center">
                    <h3> Créer un event</h3>
                </p>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'event.store','enctype'=>'multipart/form-data']) !!}
                @csrf
                <div class="form-group  {!! $errors->has('Titre') ? 'has-error' : '' !!}">
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Nom de
                            l\'event', 'maxlength' => '20']) !!}

                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::textarea('description', null, ['class' => 'form-control ', 'placeholder' =>
                            'Description de l\'event', 'maxlength' => '100']) !!}

                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            <select name='color' class=" form-control ">
                                <option style="background-color:Violet" value="Violet">Violet</option>
                                <option style="background-color:SlateGray" value="SlateGray">SlateGray</option>
                                <option style="background-color:SkyBlue" value="SkyBlue">SkyBlue</option>
                                <option style="background-color:SeaGreen" value="SeaGreen">SeaGreen</option>
                                <option style="background-color:Orchid" value="Orchid">Orchid</option>
                                <option style="background-color:Orange" value="Orange">Orange</option>
                                <option style="background-color:NavajoWhite" value="NavajoWhite">NavajoWhite</option>
                                <option style="background-color:MediumSeaGreen" value="MediumSeaGreen">MediumSeaGreen
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email" class=" col-form-label text-md-right">Date de début</label>
                            <input name="task_date" id="date" class="form-control" style="width: 100%; display: inline;"
                                onchange="invoicedue(event);" required="" type="text" readonly>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="email" class=" col-form-label text-md-right">Date de fin</label>
                            <input name="task_end" id="fin" class="form-control" style="width: 100%; display: inline;"
                                onchange="invoicedue(event);" required="" type="text" readonly>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    {!! Form::submit('Créer !', ['class' => 'btn btn-success pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection