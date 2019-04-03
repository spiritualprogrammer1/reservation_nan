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
            <div class="panel-heading row">
                <h3 class="col-md-12 text-center text-info"> <u>Formulaire de modifiation de l' utilisateur</u> </h3>
            </div>
            <div class="panel-body">
                {!! Form::model($user, ['route' => ['updateusers', $user->id], 'method' => 'put']) !!}
                    <div class="row">                            
                        <a type="button" class="btn pull-right" href="{{url("user")}}">Retour</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                            {!! Form::label('name', 'Nom & prénoms', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class'   =>  'form-control']) !!}
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="col-md-6 form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                            {!! Form::label('email', 'Email', null) !!}
                            {!! Form::email('email', null, ['class'   =>  'form-control']) !!}
                            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        {{--<div class="col-md-6 form-group {!! $errors->has('password') ? 'has-error' : '' !!}">--}}
                            {{--{!! Form::label('password', 'Mot de passe', ['class' => 'control-label']) !!}--}}
                            {{--{!! Form::password('password', ['class'   =>  'form-control']) !!}--}}
                            {{--{!! $errors->first('password', '<small class="help-block">:message</small>') !!}--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 form-group {!! $errors->has('password_confirmation') ? 'has-error' : '' !!}">--}}
                            {{--{!! Form::label('password_confirmation', "Confirmation du mot de passe", ['class' => 'control-label']) !!}--}}
                            {{--{!! Form::password('password_confirmation', ['class'   =>  'form-control']) !!}--}}
                            {{--{!! $errors->first('password_confirmation', '<small class="help-block">:message</small>') !!}--}}
                        {{--</div>--}}
                    </div>
                    <div class="row">
                        {{--<div class="col-md-6 form-group {!! $errors->has('type_user_id') ? 'has-error' : '' !!}">--}}
                            {{--{!! Form::label('type_user_id', 'Type utilisateur', null) !!} <br/>--}}
                            {{--{!! Form::select('type_user_id', $types, null, ['class'   =>  'form-control', 'placeholder' => 'Selectionner un type utilisateur']) !!}--}}
                            {{--{!! $errors->first('type_user_id', '<small class="help-block">:message</small>') !!}--}}
                        {{--</div>--}}
                        <div class="col-md-6 form-group">
                            {!! Form::submit('Modifier', ['class' => 'btn btn-success pull-right']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection