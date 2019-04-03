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

            <div class="panel panel-heading card" style="margin-bottom: 40px;"><h3 class="text-center text-danger"> <u>Modifier une periode</u> <i class="fa fa-times"></i> <i></i> </h3></div>




            <div class="demo-masked-input card">
                <div class="row">

                    <div class="col-md-12">
                        {!! Form::model($periode, ['route' => ['periode.update', $periode->id], 'method' => 'put']) !!}
                        <div class="row clearfix">

                            <div class="col-lg-3 col-md-6"> <b>Heure de debut </b>

                                <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" name="heureDebut" value="{{$periode->heureDebut}}" class="form-control" value="18:14"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                </div>
									@if ($errors->has('heureDebut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('heureDebut') }}</strong>
                                    </span>
									@endif
                            </div>
                            <div class="col-lg-3 col-md-6"> <b>Heure de fin</b>

                                <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" name="heureFin" value="{{$periode->heureFin}}" class="form-control" value="18:14"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                </div>
									@if ($errors->has('heureFin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('heureFin') }}</strong>
                                    </span>
									@endif
                            </div>

                            <div class="col-lg-3 col-md-6"> <b class="text-danger">Activer</b>
                                <div class="input-group input-group-lg"> <span class="input-group-addon">
                                       <input type="checkbox" name="isActive" value="1" class="check" id="minimal-checkbox-2" >
                                    <label for="ig_checkbox"></label>
                                    </span>
									@if ($errors->has('isActive'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isActive') }}</strong>
                                    </span>
									@endif
                                </div>
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