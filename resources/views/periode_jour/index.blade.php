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


</style>
<div class="">

    <div class=" panel-blue"><h3 style="color:#fff;">Liste des periodes jours</h3></div>
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
    </div>
    <div class="panel panel-body">


        <div class="table-responsive">
            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Jour</th>
                    <th>Periode</th>
                    <th>Etat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($periodeJours as $periodeJour)
                    <tr class="xl-blue">
                        <td>{{$loop->index + 1}}</td>
                        <td>{{\Carbon\Carbon::parse($periodeJour->day->jour)->toFormattedDateString()}}</td>
                        <th>{{$periodeJour->periode->heureDebut}}-{{$periodeJour->periode->heureFin}}</th>
                        <th>
                            @if($periodeJour->isActive)
                                <span class="label label-success">Activer</span>
                            @else
                                <span class="label label-danger">Desactiver</span>
                            @endif
                        </th>
                        <td>
                            {{--<a   href="{{asset("/periode-jour/$periodeJour->id/voir-periode-du-jour")}}"><i class="fa fa-eye"></i></a>--}}
                            <form id="periode-jour-{{$periodeJour->id}}" method="get" action="{{asset("/periode-jour/$periodeJour->id/effacer-periode-du-jour")}}" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                            </form>
                            <a href="{{asset("/periode-jour/$periodeJour->id/effacer-periode-du-jour")}}"
                               onclick="event.preventDefault();
                                       document.getElementById('periode-jour-{{$periodeJour->id}}').submit();">
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
@endsection