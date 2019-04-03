@extends('layout.master')

@section('content')


<style>

.panel-blue{
    border-color: rgb(156, 73, 255);
    color: #fff;
    background-color: rgb(156, 73, 255);
    font-weight: 500;
    text-transform: uppercase;
    padding: 20px 25px;
    font-size:20px;
    text-align:center;
}


.colorBlue{
    color:#fff;
    font-size:17px;
    background-color: rgb(156, 73, 255);
    padding:15px;
    text-align:center;
    border:1px solid rgb(156, 73, 255);
    border-radius:5px;
    transition:0.5s;
}

.colorBlue:hover{
    background-color: rgb(0, 170, 255);
    border:1px solid rgb(0, 170, 255);
    transition:0.5s;
}


.colorlight{
    color:rgb(156, 73, 255);
    font-size:17px;
    background-color: #fff;
    padding:15px;
    text-align:center;
    border:1px solid rgb(156, 73, 255);
    border-radius:5px;
    transition:0.5s;
}

.colorlight:hover{
    color:#fff;
  
    background-color: rgb(156, 73, 255);
    border:1px solid rgb(156, 73, 255);
    transition:0.5s;
}


</style>
    {{--<div class="block-header">--}}
        {{--<div class="row card">--}}
            {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                {{--<h2 class="text-center text-info">--}}
                    {{--Gestion des Macs   <i class="material-icons">desktop_mac</i>--}}
                {{--</h2>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row clearfix">--}}




        {{--<div class="col-md-4">--}}

            {{--@if(session('success'))--}}
                {{--<div class="alert alert-success">--}}
                    {{--<strong> <i class="material-icons">desktop_mac</i>! </strong> Traitement Effectuer avec succès </div>--}}
            {{--@endif--}}
            {{--@if(session('error'))--}}

                    {{--<div class="alert alert-danger">--}}
                        {{--{{session('error')}}--}}
                    {{--</div>--}}
            {{--@endif--}}


            {{--{!! Form::open(['route' => 'mac.store']) !!}--}}

            {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                {{--<div class="card">--}}
                    {{--<div class="body">--}}

                        {{--<div class="row clearfix">--}}
                            {{--<div class="col-lg-6 col-md-3 col-sm-3 {!! $errors->has('numMac') ? 'has-error' : '' !!}">--}}
                                {{--<div class="input-group input-group-lg"> <span class="input-group-addon">  <i class="material-icons">desktop_mac</i>  </span>--}}
                                    {{--<div class="form-line">--}}
                                        {{--<input type="number" min="1" name="numMac" class="form-control" placeholder="Numero du mac">--}}
                                        {{--{!! $errors->first('numMac', '<small class="help-block">:message</small>') !!}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-2 col-md-6 col-sm-12 {!! $errors->has('isActive') ? 'has-error' : '' !!}">--}}

                                {{--<div class="input-group input-group-lg"> <span class="input-group-addon">--}}
                                    {{--<input type="checkbox" name="isActive" value="1" class="filled-in" id="ig_checkbox">--}}
                                    {{--<label for="ig_checkbox"></label>--}}
                                        {{--{!! $errors->first('isActive', '<small class="help-block">:message</small>') !!}--}}
                                    {{--</span>--}}
                                {{--</div>--}}

                            {{--</div>--}}

                            {{--<div class="col-lg-4 col-md-6 col-sm-12">--}}
                                {{--<button type="submit" class="btn  btn-raised bg-blue waves-effect"><i class="material-icons text-danger">save</i></button>--}}
                            {{--</div>--}}

                        {{--</div>--}}


                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--{!! Form::close() !!}--}}
        {{--</div>--}}



        {{--<div class="col-md-8 card">--}}
            {{--<table class="table table-bordered table-striped table-hover js-basic-example dataTable">--}}
                {{--<thead>--}}

                {{--<tr>--}}
                    {{--<th>Id</th>--}}
                    {{--<th>Numero du mac</th>--}}
                    {{--<th>Etat</th>--}}
                    {{--<th>Action</th>--}}
                {{--</tr>--}}

                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach ($macs as $mac)--}}
                    {{--<tr>--}}
                        {{--<td>{{$loop->index + 1}}</td>--}}
                        {{--<td>{{$mac->numMac}}</td>--}}
                        {{--<td>--}}
                            {{--@if($mac->isActive)--}}
                                {{--<span class="label label-success">Activer</span>--}}
                            {{--@else--}}
                                {{--<span class="label label-danger">Desactiver</span>--}}
                            {{--@endif--}}
                        {{--</td>--}}
                        {{--<td>--}}
                            {{--<a type="" class="text-info" href="/mac/{{$mac->id}}/visioner-info-mac"><i class="material-icons">remove_red_eye</i></a>--}}
                            {{--<a  class="" href="/mac/{{$mac->id}}/editer-info-mac"><i class="material-icons">border_color</i> </a>--}}
                            {{--<form id="macdestroy-{{$mac->id}}" method="get" action="/mac/{{$mac->id}}/effacer-info-mac" style="display: none;">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--{{ method_field('delete') }}--}}
                            {{--</form>--}}
                            {{--<a href="/mac/{{$mac->id}}/effacer-info-mac"--}}
                               {{--onclick="event.preventDefault();--}}
                                       {{--document.getElementById('macdestroy-{{$mac->id}}').submit();"--}}
                               {{--type=""--}}
                               {{--class="text-danger" style="margin: 0px 5px;">--}}
                                {{--<i class="material-icons">delete_forever</i>--}}


                            {{--</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}

                {{--@endforeach--}}

                {{--</tbody>--}}

            {{--</table>--}}
        {{--</div>--}}


    {{--</div>--}}




    <div class="row">
        <div class="col-md-12 text-center">
          <h2 class=""> <u>Gestion des Macs</u> <i class="fa fa-spin fa-circle-o-notch text-danger"></i> </h2>
        </div>

    </div>





    <div class="container-fluid">
        @if(session('success'))
           <div class="row">
               <div class="col-md-4">

               </div>
               <div class="alert alert-success col-md-8 ">
                   <strong> <i class="fa  fa-thumbs-o-up"></i>! </strong>  <b>Traitement Effectuer avec succès</b> </div>

           </div>
        @endif
        @if(session('error'))

            <div class="alert alert-danger">
                {{session('error')}}
            </div>
    @endif
        <!--.row-->
        <div class="row">
            <div class="col-md-4">
                <div class="white-box">
                    <h3 class="box-title m-b-0 panel-info text-success"> <u>Nouveau mac ou nouvelle place</u> </h3>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            {!! Form::open(['route' => 'mac.store']) !!}
                                <div class="form-group col-md-8 {!! $errors->has('numMac') ? 'has-error' : '' !!}">
                                    <label for="exampleInputuname">Numero Mac</label>
                                    <div class="input-group ">
                                        <div class="input-group-addon"><i class="fa fa-fax"></i></div>
                                        <input type="number" min="1" name="numMac" class="form-control" id="exampleInputuname" placeholder="Numero mac"> </div>
                                    {!! $errors->first('numMac', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="form-group col-md-4 {!! $errors->has('isActive') ? 'has-error' : '' !!}">
                                    <label for="exampleInputEmail1">Activer</label>
                                    <div class="input-group">
                                        <input type="checkbox" name="isActive" value="1" class="check" id="minimal-checkbox-2" >
                                        {!! $errors->first('isActive', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <button type="submit" class="colorBlue"><i class="fa fa-save"></i></button>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-blue"> Liste des macs <i class=" fa fa-clone"></i> </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">

                                <div class="white-box">

                                    <div class="table-responsive">
                                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Numero du mac</th>
                                                <th>Etat</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($macs as $mac)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{$mac->numMac}}</td>
                                                    <td>
                                                        @if($mac->isActive)
                                                            <span class="label label-success">Activer</span>
                                                        @else
                                                            <span class="label label-danger">Desactiver</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{--<a type="" class="text-info" href="/mac/{{$mac->id}}/visioner-info-mac"><i class="fa fa-eye-slash"></i></a>--}}
                                                        <a  class="" href="{{asset("/mac/$mac->id/editer-info-mac")}}" ><button class="colorlight" ><i class="fa fa-edit"></i></button></a>
                                                        <form id="macdestroy-{{$mac->id}}" method="get" action="{{asset("/mac/$mac->id/effacer-info-mac")}}" style="display: none;">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                        </form>
                                                        <a  href="{{asset("/mac/$mac->id/effacer-info-mac")}}"
                                                           onclick="event.preventDefault();
                                                                   document.getElementById('macdestroy-{{$mac->id}}').submit();"
                                                           type=""
                                                           >
                                                           <button class="colorBlue" ><i class="fa fa-trash"></i></button>


                                                        </a>
                                                    </td>
                                                </tr>

                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                        </div>
                    </div>
                </div>

        </div>

    </div>







@endsection