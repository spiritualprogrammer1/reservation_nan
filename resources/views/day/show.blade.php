@extends('layout.master')

@section('content')
    <div class="panel panel-heading"><h3 class="text-center text-danger">Détails  <i class="material-icons">today</i> <i></i> </h3></div>
    <div class="col-md-12">
        <div class="card">

            <div class="row">
                <div class="col-md-3">
                    <a  class="btn btn-raised btn-info waves-effect" href="{{asset("/jour")}}>Retour</a>
                </div>

                <div class="col-md-3 form-group text-center">

                    <span class="text-danger">  <h4>Le : {{$day->jour}}</h4> </span>
                </div>
        </div>

        </div>
    </div>
@endsection