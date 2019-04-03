


@extends('layout.master')

@section('content')

    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                <span> <b> {{ session('success') }} <i class="fa  fa-check"></i> </b> </span>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card">
                            <h2 class="text-center text-info maj">Consulter les periodes de reservation pour les places</h2>
                        </div>
                            <div class="alert alert-danger" role="alert" style="background: rgba(255,0,0,0.43); border:1px solid rgba(255,0,0,0.43)">
                                <h2>Règle de reservation<h2>
                                <ul style="list-style:none">
                                    <li><h3><img style="height: 40px; margin-right: 10px;" src="{{asset('images/info.png')}}"  alt="">Réserver sur cette page ne vous donne pas accès à la salle informatique</h3></li>
                                    <li><h3><img style="height: 40px; margin-right: 10px;" src="{{asset('images/info.png')}}"  alt="">Chaque étudiant à droit à une réservation par semaine</h3></li>
                                    <li><h3><img style="height: 40px; margin-right: 10px;" src="{{asset('images/info.png')}}"  alt="">Une fois le jour de réservation arrivé, l'étudiant ne peut annuler sa reservation</h3></li>
                                    <li><h3><img style="height: 40px; margin-right: 10px;" src="{{asset('images/info.png')}}"  alt="">Vous n'avez pas le droit de vous déplacer vers la salle informatique</h3></li>
                                </ul>
                            </div>

                        <section class="blog-page">
                            <div class="block-header">
                                <div class="row">

                                </div>
                            </div>
                            <div class="">
                                <div class="row" >


                                    <div class="row el-element-overlay m-b-20">
                                        <!-- /.usercard -->
                                        <div class="col-md-12">
                                            <hr> </div>

                                        <div id="cantinereal">
                                            @foreach ($periodeJours->chunk(3) as $itemChunck)

                                                @foreach ($itemChunck as $item)
                                                    @if(20 - \App\UserMac::where('periode_jour_id', $item->id)->where('mac_id',null)->count() >=  0)
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 animated rollIn">
                                                            <div class="white-box">
                                                                <div class="el-card-item">
                                                                    <div class="el-card-avatar el-overlay-1"> <img src="{{asset('images/mac.jpg')}}" />
                                                                    </div>
                                                                    <div class="el-card-content">
                                                                        <h3 class="box-title" >PERIODE</h3>
                                                                        <h4 class="text-danger date">{{\Carbon\Carbon::parse($item->day->jour)->toFormattedDateString()}}</h4>
                                                                        <h5><b class="">Heure : de  {{$item->periode->heureDebut}} H a {{$item->periode->heureFin}} H </b></h5>

                                                                        <h3>Nombre de place disponible : <span id="{{$item->id}}" class="text-danger date cantine">{{20 - \App\UserMac::where('periode_jour_id', $item->id)->where('mac_id',null)->count()}}</span> </h3>


                                                                        <a href="javascript:void(0);"  onclick="event.preventDefault();document.getElementById('mac-{{$item->id}}').submit();" class="btn btn-info ">  <b>Reserver</b> </a>
                                                                        <form id="mac-{{$item->id}}" method="post" action="{{asset("/reserver")}}" style="display: none;">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('post') }}
                                                                            {!! Form::number('user_id', auth()->user()->id,null) !!}
                                                                            {!! Form::number('periode_jour_id', $item->id,null) !!}
                                                                        </form>
                                                                        <br/> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>


        var idperiodejour = $(this).attr("data-id");



        function realselectmac()
        {
            $.get('../../reservationsearchcantine/', function (data) {
                $('#cantinereal').html(data);
                console.log("hello")

            })


        }


        setInterval(realselectmac, 4000);
    </script>
@endsection

