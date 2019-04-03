{{--@extends('layout.master')--}}

{{--@section('content')--}}



    {{--<div class="block-header">--}}
        {{--<div class="row card">--}}
            {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                {{--<h2 class="text-center text-info">--}}
                    {{--<span class="text-success">Modifier le range</span>--}}
                {{--</h2>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}



    {{--<div class="row clearfix">--}}


        {{--<div class="col-md-12">--}}

            {{--@if(session('success'))--}}
                {{--<div class="alert alert-success">--}}
                    {{--<strong> <i class="material-icons">desktop_mac</i>! </strong> Traitement Effectuer avec succès </div>--}}
            {{--@endif--}}
            {{--@if(session('error'))--}}

                {{--<div class="alert alert-danger">--}}
                    {{--{{session('error')}}--}}
                {{--</div>--}}
            {{--@endif--}}

                {{--{!! Form::model($range, ['route' => ['range.update', $range->id], 'method' => 'put']) !!}--}}

            {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                {{--<div class="card">--}}
                    {{--<div class="body">--}}

                        {{--<div class="row clearfix">--}}


                            {{--<div class="col-lg-4 col-md-6"> <b>Date Debut</b>--}}
                                {{--<div class="input-group"> <span class="input-group-addon"> <i class="material-icons">date_range</i> </span>--}}
                                    {{--<div class="form-line">--}}
                                        {{--<input type="text" name="dateDebut"  value="{{$range->dateDebut}}" class="form-control date" placeholder="Ex: 30/07/2016" required >--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-lg-4 col-md-6"> <b>Date Fin</b>--}}
                                {{--<div class="input-group"> <span class="input-group-addon"> <i class="material-icons">date_range</i> </span>--}}
                                    {{--<div class="form-line">--}}
                                        {{--<input type="text"  name="dateFin" value="{{$range->dateFin}}" class="form-control date" placeholder="Ex: 30/07/2016" required>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-4 col-md-6"> <b></b>--}}
                                {{--<div class="input-group"> <span class="input-group-addon">  </span>--}}
                                    {{--<div class="">--}}
                                        {{--<br>--}}
                                        {{--<button type="submit" class="btn  btn-raised bg-green waves-effect"> <i class="material-icons">edit</i> </button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}


                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--{!! Form::close() !!}--}}
        {{--</div>--}}

    {{--</div>--}}




{{--@endsection--}}



@extends('layout.master')

@section('content')
    <div class="container">
        <div class="panel">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif

            <div class="panel panel-heading card" style="margin-bottom: 40px;"><h3 class="text-center text-danger"> <u>Modifier la Range</u> <i class="fa fa-times"></i> <i></i> </h3></div>




            <div class="demo-masked-input card">
                <div class="row">

                    <div class="col-md-12">
                        {!! Form::model($range, ['route' => ['range.update', $range->id], 'method' => 'put']) !!}
                        <div class="row clearfix">

                            <div class="col-lg-3 col-md-6"> <b>Date debut </b>

                                <div class="input-group" >
                                    <input type="text" name="dateDebut" id="datepicker-autoclose"  value="{{$range->dateDebut}}" class="form-control" value="18:14"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                </div>

                                {!! $errors->first('dateDebut', '<small class="help-block">:message</small>') !!}

                            </div>
                            <div class="col-lg-3 col-md-6"> <b>Date fin</b>

                                <div class="input-group">
                                    <input type="text" id="datepicker-autocloses"  name="dateFin" value="{{$range->dateFin}}" class="form-control" value="18:14"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                </div>

                                {!! $errors->first('dateFin', '<small class="help-block">:message</small>') !!}

                            </div>

                            <div class="col-lg-3 col-md-6 text-center">
                                <br>
                                <button type="submit" class="btn btn-danger"><b>MODIFIER</b></button>

                            </div>



                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>


        </div>



    </div>


@endsection