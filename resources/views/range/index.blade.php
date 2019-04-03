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


.colorTwo{
    color:rgb(156, 73, 255);
    font-size:17px;
    background-color: #fff;
    padding:5px;
    text-align:center;
    border:1px solid rgb(156, 73, 255);
    border-radius:5px;
    transition:0.5s;
}

.colorTwo:hover{
    color:#fff;
  
    background-color: rgb(156, 73, 255);
    border:1px solid rgb(156, 73, 255);
    transition:0.5s;
}




</style>
    <div class="">
        <div class="panel">

            <div class="panel-blue" ><h3 style="color:#fff;">création de Range</h3></div>



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

            <div class="demo-masked-input card">
                <div class="row" style="padding:14px;">


                    <div class="col-md-2">
                        <br/><br />
                        {!! Form::open(['route' => 'range.store']) !!}
                        <div class="row clearfix">

                            <div class="col-lg-12 col-md-6"> <b>Date debut </b>
                                <div class="input-group " >
                                    <input type="text" name="dateDebut" id="datepicker-autoclose" class="form-control" > <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                </div>
                                {!! $errors->first('heureDebut', '<small class="help-block">:message</small>') !!}


                            </div>
                            <div class="col-lg-12 col-md-6"> <b>Date fin</b>
                                <div class="input-group  " >
                                    <input type="text" name="dateFin" id="datepicker-autocloses" class="form-control" > <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                </div>

                                {!! $errors->first('heureFin', '<small class="help-block">:message</small>') !!}

                            </div>

                            <div class="col-lg-12 col-md-6 text-center">
                                <br>
                                <button type="submit" class="colorTwo"> <b>enregistrer</b> </button>
                            </div>

                        </div>
                        {!! Form::close() !!}

                    </div>

                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date de debut</th>
                                    <th>Date de fin</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($ranges as $range)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td >{{\Carbon\Carbon::parse($range->dateDebut)->toFormattedDateString()}}</td>
                                        <td >{{\Carbon\Carbon::parse($range->dateFin)->toFormattedDateString()}}</td>
                                        <td>
                                            {{--<a  class="btn  btn-raised bg-cyan waves-effect" href="/range/{{$range->id}}/visioner-info"> <i class="fa fa-eye"></i> </a>--}}
                                            <a   href="{{asset("/range/$range->id/editer-info")}}"><button class="colorBlue" ><i class="fa fa-edit"></i></button></a>
                                            <form id="rangedestroy-{{$range->id}}" method="get" action="{{asset("/range/$range->id/effacer-info")}}" style="display: none;">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>
                                            <a href="{{asset("/mac/$range->id/effacer-info")}}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('rangedestroy-{{$range->id}}').submit();"

                                               >
                                               <button class="colorBlue" ><i class="fa fa-trash "></i></button>
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



@endsection