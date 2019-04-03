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

            <div class="panel-blue"><h3 style="color:#fff;">Créer une periode</h3></div>
            <div class="demo-masked-input card">
               <div class="row" style="padding:14px;">
                   <div class="col-md-2">
                       <br/>
                       {!! Form::open(['route' => 'periode.store']) !!}
                       <div class="row clearfix">

                           <div class="col-lg-12 col-md-6"> <b>Heure de debut </b>
                               <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                   <input type="text" name="heureDebut" class="form-control" value="13:14"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                               </div>
                               {!! $errors->first('heureDebut', '<small class="help-block">:message</small>') !!}
                           </div>
                           <div class="col-lg-12 col-md-6"> <b>Heure de fin</b>
                               <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                   <input type="text" name="heureFin" class="form-control" value="18:14"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                               </div>
                               {!! $errors->first('heureFin', '<small class="help-block">:message</small>') !!}
                           </div>
                           <div class="col-lg-12 col-md-6"> <b>Activer la période</b>
                               <div class="input-group input-group-lg"> <span class="input-group-addon">
                                       <input type="checkbox" name="isActive" value="1" class="check" id="minimal-checkbox-2" >
                                    <label for="ig_checkbox"></label>
                                    </span>
                                   {!! $errors->first('isActive', '<small class="help-block">:message</small>') !!}
                               </div>
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
                                       <th>Heure de debut</th>
                                       <th>Heure de fin</th>
                                       <th>Etat</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach ($periodes as $periode)
                                       <tr class="">
                                           <td>{{$loop->index + 1}}</td>
                                           <td>{{$periode->heureDebut}}</td>
                                           <td>{{$periode->heureFin}}</td>
                                           <td>
                                               @if($periode->isActive)
                                                   <span class="label label-success">Activer</span>
                                               @else
                                                   <span class="label label-danger">Desactiver</span>
                                               @endif
                                           </td>
                                           <td>
                                               {{--<a  href="{{asset("/periode/$periode->id/visioner-info")}}"><i class="fa fa-eye"></i></a>--}}
                                               <a   href="{{asset("/periode/$periode->id/editer-info")}}"><button class="colorlight" ><i class="fa fa-edit"></i></button></a>
                                               <form id="macdestroy-{{$periode->id}}" method="get" action="{{asset("/periode/$periode->id/effacer-info")}}" style="display: none;">
                                                   {{ csrf_field() }}
                                                   {{ method_field('delete') }}
                                               </form>
                                               <a href="{{asset("/periode/$periode->id/effacer-info")}}"
                                                  onclick="event.preventDefault();
                                                          document.getElementById('macdestroy-{{$periode->id}}').submit();"
                                                  type=""
                                                  class="" style="margin: 0px 5px;">
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
@endsection