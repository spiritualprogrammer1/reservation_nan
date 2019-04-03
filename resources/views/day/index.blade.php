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
    </div>

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-blue"> Liste des jours <i class=" fa fa-clone"></i> </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">

                <div class="white-box">

                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Jour</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($days as $day)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td >{{\Carbon\Carbon::parse($day->jour)->toFormattedDateString()}}</td>
                                    <td>
                                        {{--<a  class=" waves-effect" href="{{asset("/jour/$day->id/voir-jour")}}" >Voir</a>--}}
                                        <form id="day-{{$day->id}}" method="get"  action="{{asset("/jour/$day->id/effacer-jour")}}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                        </form>
                                        <a  href="{{asset("/jour/$day->id/effacer-jour")}}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('day-{{$day->id}}').submit();"

                                           >
                                           <button class="colorBlue" ><i class="fa fa-trash "></i></button>
                                            
                                        </a>
                                        <a  class=" waves-effect" href="{{asset("/range/$day->range_id/visioner-info")}}">
                                        <button class="colorTwo" ><i class="fa fa-eye "></i> Voir range</button>
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