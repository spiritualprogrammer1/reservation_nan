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
                    <a type="button" class="btn pull-right" href="/type_user">Retour</a>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group {!! $errors->has('libelle') ? 'has-error' : '' !!}">
                        {!! Form::label('libelle', 'Libelle', ['class' => 'control-label']) !!}
                        {!! Form::text('libelle', $typeUser->libelle, ['class'   =>  'form-control', 'disabled'   =>  'disabled']) !!}
                        {!! $errors->first('libelle', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="col-md-6 form-group {!! $errors->has('groupe') ? 'has-error' : '' !!}">
                        {!! Form::label('groupe', 'Groupe', null) !!}
                        {!! Form::text('groupe', $typeUser->groupe, ['class'   =>  'form-control', 'disabled'   =>  'disabled']) !!}
                        {!! $errors->first('groupe', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group {!! $errors->has('equipe') ? 'has-error' : '' !!}">
                        {!! Form::label('equipe', 'Equipe', ['class' => 'control-label']) !!}
                        {!! Form::text('equipe', $typeUser->equipe, ['class'   =>  'form-control', 'disabled'   =>  'disabled']) !!}
                        {!! $errors->first('equipe', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="col-md-6 form-group {!! $errors->has('nbreHeure') ? 'has-error' : '' !!}">
                        {!! Form::label('nbreHeure', "Nombre de reservation par semaine", ['class' => 'control-label']) !!}
                        {!! Form::number('nbreHeure', $typeUser->nbreHeure, ['class'   =>  'form-control', 'disabled'   =>  'disabled']) !!}
                        {!! $errors->first('nbreHeure', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group {!! $errors->has('autoriseAComposer') ? 'has-error' : '' !!}">
                        {!! Form::label('autoriseAComposer', 'Est autorise a composer', null) !!} <br/>
                        @if($typeUser->autoriseAComposer)
                            <span class="label label-success">Autoriser</span>   
                        @else
                            <span class="label label-danger">Non Autoriser</span>
                        @endif
                        {!! $errors->first('autoriseAComposer', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection