@extends('layout.master')

@section('content')




    @if(session('success'))
        <div class="alert alert-success">
            <strong> <i class="material-icons"></i>! </strong> Traitement Effectuer avec succès </div>
    @endif
    @if(session('error'))

        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif



    <div class="col-md-10">
        <div class="panel panel-info">
            <div class="panel-heading text-center"> Modifier les informations <i class=" fa fa-clone"></i> </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">

                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            {!! Form::open(['route' => ['mac.update', $mac->id], 'method' => 'put']) !!}
                            <div class="form-group col-md-6 {!! $errors->has('numMac') ? 'has-error' : '' !!}">
                                <label for="exampleInputuname">Numero Mac</label>
                                <div class="input-group ">
                                    <div class="input-group-addon"><i class="fa fa-fax"></i></div>
                                    <input type="number" min="1" value="{{$mac->numMac}}" name="numMac" class="form-control" id="exampleInputuname" placeholder="Numero mac"> </div>
                                {!! $errors->first('numMac', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-4 {!! $errors->has('isActive') ? 'has-error' : '' !!}">
                                <label for="exampleInputEmail1">Activer</label>
                                <div class="input-group">
                                    <input type="checkbox" name="isActive" value="1" class="check" id="minimal-checkbox-2" >
                                    {!! $errors->first('isActive', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-2 ">
                                <br>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-warning btn-rounded waves-effect waves-light m-r-10"><i class="fa fa-save"></i></button>

                                </div>
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>



@endsection