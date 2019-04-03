@extends('layout.master')

@section('content')
    <div class="container">
        <div class="panel">
            @if(session('success'))
                <div class="panel panel-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="panel panel-danger">
                    {{session('error')}}
                </div>
            @endif
            <div class="panel-heading">
                <div class="" style="margin-bottom: 40px;"><h3 class="text-center text-danger"> <u>Modifier le type utilisateur</u>  <i class="fa fa-user"></i> <i></i> </h3></div>

            </div>
            <div class="panel-body">
                {!! Form::model($typeUser, ['route' => ['type_user.update', $typeUser->id], 'method' => 'put']) !!}
                    <div class="row">                            
                        <a type="button" class="btn btn-default btn-rounded pull-right" href="{{asset("/type_user")}}">Retour</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group {!! $errors->has('libelle') ? 'has-error' : '' !!}">
                            {!! Form::label('libelle', 'Libelle', ['class' => 'control-label']) !!}
                            {!! Form::text('libelle', null, ['class'   =>  'form-control']) !!}
                            {!! $errors->first('libelle', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="col-md-6 form-group {!! $errors->has('groupe') ? 'has-error' : '' !!}">
                            {!! Form::label('groupe', 'Groupe', null) !!}
                            {!! Form::text('groupe', null, ['class'   =>  'form-control']) !!}
                            {!! $errors->first('groupe', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group {!! $errors->has('equipe') ? 'has-error' : '' !!}">
                            {!! Form::label('equipe', 'Equipe', ['class' => 'control-label']) !!}
                            {!! Form::text('equipe', null, ['class'   =>  'form-control']) !!}
                            {!! $errors->first('equipe', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="col-md-6 form-group {!! $errors->has('nbreHeure') ? 'has-error' : '' !!}">
                            {!! Form::label('nbreHeure', "Nombre de reservation par semaine", ['class' => 'control-label']) !!}
                            {!! Form::number('nbreHeure', null, ['class'   =>  'form-control']) !!}
                            {!! $errors->first('nbreHeure', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group {!! $errors->has('autoriseAComposer') ? 'has-error' : '' !!}">
                            {!! Form::label('autoriseAComposer', 'Est autorise a composer', null) !!} <br/>
                            {!! Form::checkbox('autoriseAComposer', '1') !!}
                            {!! $errors->first('autoriseAComposer', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    {{--<div class="panel">--}}

        {{--@if(session('success'))--}}
            {{--<div class="alert alert-success">--}}
                {{--{{session('success')}}--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--@if(session('error'))--}}
            {{--<div class="alert alert-danger">--}}
                {{--{{session('error')}}--}}
            {{--</div>--}}
        {{--@endif--}}

        {{--{!! Form::open(['route' => 'type_user.store']) !!}--}}

        {{--<div class="">--}}
            {{--<div class="row clearfix">--}}
                {{--<div class="col-lg-4 col-md-6" > <b>Libelle</b>--}}
                    {{--<div class="input-group"> <span class="input-group-addon"> <i class="fa fa-comments-o"></i> </span>--}}
                        {{--<div class="form-line">--}}
                            {{--<input type="text" name="libelle" class="form-control date" placeholder="Entre le libelle">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 col-md-6"> <b>Groupe </b>--}}
                    {{--<div class="input-group"> <span class="input-group-addon"> <i class="fa fa-group"></i> </span>--}}
                        {{--<div class="form-line">--}}
                            {{--<input type="text" name="groupe" class="form-control time24" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 col-md-6"> <b>Equipe </b>--}}
                    {{--<div class="input-group"> <span class="input-group-addon"> <i class="fa  fa-user"></i> </span>--}}
                        {{--<div class="form-line">--}}
                            {{--<input type="text" name="equipe" class="form-control time12" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 col-md-6"> <b>nbre de reservation/semaine</b>--}}
                    {{--<div class="input-group"> <span class="input-group-addon"> <i class="fa fa-database"></i> </span>--}}
                        {{--<div class="form-line">--}}
                            {{--<input type="text" name="nbreHeure" class="form-control datetime" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 col-md-6"> <b>Est autorisé a reservé</b>--}}
                    {{--<div class="input-group input-group-lg"> <span class="input-group-addon">--}}
                                {{--<input type="checkbox" name="autoriseAComposer" class="check" id="minimal-checkbox-2" checked>--}}
                                    {{--<label for="ig_checkbox"></label>--}}
                                    {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 col-md-6">--}}
                    {{--<div class="input-group input-group-lg">--}}
                        {{--<br>--}}
                        {{--<button type="submit" class="btn btn-success"><i class="fa fa-save"></i></button>--}}
                    {{--</div>--}}

                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}

        {{--{!! Form::close() !!}--}}

    {{--</div>--}}
@endsection