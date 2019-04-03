@extends('layouts.app')

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
                <h1>Visioner les information du type utilisateur</h1>
            </div>
            <div class="panel-body">
                {!! Form::open() !!}
                <div class="row">                            
                    <a type="button" class="btn pull-right" href="/user">Retour</a>
                </div>
                <div class="row">
                        <div class="col-md-6 form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                            {!! Form::label('name', 'Nom & prénoms', ['class' => 'control-label']) !!}
                            {!! Form::text('name', $user->name, ['class'   =>  'form-control']) !!}
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="col-md-6 form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                            {!! Form::label('email', 'Email', null) !!}
                            {!! Form::email('email', $user->email, ['class'   =>  'form-control']) !!}
                            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group {!! $errors->has('type_user_id') ? 'has-error' : '' !!}">
                            {!! Form::label('type_user_id', 'Type utilisateur', null) !!} <br/>
                            {!! Form::select('type_user_id', $types, $user->type_user_id, ['class'   =>  'form-control', 'placeholder' => 'Selectionner un type utilisateur']) !!}
                            {!! $errors->first('type_user_id', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection