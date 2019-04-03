@extends('layout.master')

@section('content')





    {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
            {{--<div class="white-box">--}}
                {{--<section class="cd-horizontal-timeline">--}}
                    {{--<div class="timeline">--}}
                        {{--<div class="events-wrapper">--}}
                            {{--<div class="events">--}}

                                {{--<ol>--}}
                                    {{--@forelse ($userMacs as $userMac)--}}
                                    {{--<li><a href="#0" data-date="{{ $userMac->periode_jour->day->jour }}" class="selected">{{ $userMac->periode_jour->day->jour }}</a></li>--}}

                                    {{--@empty--}}
                                        {{--Aucune date--}}

                                    {{--@endforelse--}}

                                {{--</ol> <span class="filling-line" aria-hidden="true"></span> </div>--}}


                            {{--<!-- .events -->--}}
                        {{--</div>--}}
                        {{--<!-- .events-wrapper -->--}}
                        {{--<ul class="cd-timeline-navigation">--}}
                            {{--<li><a href="#0" class="prev inactive">Prev</a></li>--}}
                            {{--<li><a href="#0" class="next">Next</a></li>--}}
                        {{--</ul>--}}
                        {{--<!-- .cd-timeline-navigation -->--}}
                    {{--</div>--}}
                    {{--<!-- .timeline -->--}}
                    {{--<div class="events-content">--}}
                        {{--<ol>--}}
                            {{--@forelse ($userMacs as $userMac)--}}
                            {{--<li class="selected" data-date="{{ $userMac->periode_jour->day->jour }}">--}}
                                {{--<span class="btn btn-info">{{ $userMac->periode_jour->day->jour }}z</span>--}}
                                {{--<h2><img class="img-responsive img-circle pull-left m-r-20 m-b-10" width="60" alt="user" src="../plugins/images/users/1.jpg"> Horizontal Timeline<br/><small>January 16th, 2014</small></h2>--}}
                                {{--<a href="#"> <i class="material-icons">desktop_mac</i> Mac numero :  </a> <b class="text-danger">{{ $userMac->mac->numMac }}</b>--}}
                                {{--<hr class="m-t-40">--}}
                                {{--<p class="m-t-40"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.--}}
                                    {{--<button class="btn btn-info btn-rounded btn-outline">Read more</button>--}}
                                {{--</p>--}}
                            {{--</li>--}}

                            {{--@empty--}}
                                {{--Aucune date--}}

                            {{--@endforelse--}}


                        {{--</ol>--}}
                    {{--</div>--}}
                    {{--<!-- .events-content -->--}}
                {{--</section>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}




    {{--<section class="">--}}
        {{--<div class="block-header">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-7 col-md-6 col-sm-12 text-center">--}}

                    {{--<br/>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row clearfix">--}}
                {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                    {{--<ul class="cbp_tmtimeline">--}}
                        {{--<li>--}}
                            {{--<time class="cbp_tmtime" datetime="2017-11-04T18:30"><span class="hidden"></span> <span class="large"></span></time>--}}
                            {{--<div class="cbp_tmicon"><i class="zmdi zmdi-account"></i></div>--}}
                            {{--<div class="cbp_tmlabel empty"> <span> <b><span class="btn  btn-raised bg-lime waves-effect">{{\Illuminate\Support\Facades\Auth::user()->name}}</span></b>  </span> </div>--}}
                        {{--</li>--}}
                        {{--@forelse ($userMacs as $userMac)--}}
                        {{--<li>--}}
                            {{--<time class="cbp_tmtime" datetime=""><span class="btn  btn-raised bg-blue-grey waves-effect">{{ $userMac->periode_jour->day->jour }}</span> <span>jour</span></time>--}}
                            {{--<div class="cbp_tmicon bg-info"><i class="zmdi zmdi-label"></i></div>--}}
                            {{--<div class="cbp_tmlabel">--}}
                                {{--<h2><a href="#"> <i class="material-icons">desktop_mac</i> Mac numero :  </a> <b class="text-danger">{{ $userMac->mac->numMac }}</b></h2>--}}




                                {{--<p>--}}
                                    {{--<b> Periode :   de</b>     {{$userMac->periode_jour->periode->HeureDebut}}   a  {{ $userMac->periode_jour->periode->HeureFin }}--}}

                                {{--</p>--}}
                                {{--<p>--}}

                            {{--@if(Carbon\Carbon::parse($userMac->periode_jour->day->jour)->format('Y-m-d') > Carbon\Carbon::now()->format('Y-m-d') )--}}
                                    {{--<form id="userdestroy-{{$userMac->id}}" method="get" action="/reservation/{{$userMac->id}}/effacer-info" style="display: none;">--}}
                                        {{--{{ csrf_field() }}--}}
                                        {{--{{ method_field('delete') }}--}}
                                    {{--</form>--}}
                                    {{--<a href="/reservation/{{$userMac->id}}/effacer-info"--}}
                                       {{--onclick="event.preventDefault();--}}
                                               {{--document.getElementById('userdestroy-{{$userMac->id}}').submit();"--}}
                                       {{--type="button"--}}
                                       {{--class="btn  btn-raised bg-pink waves-effect" style="margin: 0px 5px;">--}}
                                        {{--Annuler la reservation--}}
                                    {{--</a>--}}
                                    {{--@endif--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--@empty--}}
                            {{--<p class="btn  btn-raised bg-light-blue waves-effect"> Aucune reservation vous concernant</p>--}}
                        {{--@endforelse--}}

                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    <div class="text-center">

    <h1  class="" > <u class="">Historique de mes reservations <i class="fa fa-history"></i> !!</u>
    </h1>

    </div>

    <div class="row">


        <div class="col-sm-12">
            <div class="white-box">

                <div class="table-responsive">
                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date jour</th>
                            <th>Periode</th>
                            <th>Numero Mac</th>
                            <th> <i class="fa fa-times"></i> Action</th>
                            <th>Enregistré le:</th>

                        </tr>
                        </thead>

                        <tbody>
                        @forelse ($userMacs as $key =>  $userMac)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="btn btn-primary disabled">{{\Carbon\Carbon::parse($userMac->periode_jour->day->jour)->toFormattedDateString()}}</td>
                            <td class="text-danger">{{$userMac->periode_jour->periode->heureDebut}} H  a  {{ $userMac->periode_jour->periode->heureFin }} H	</td>
                            <td>{{ $userMac->mac->numMac ?? 'A la cantine' }}</td>
                            <td>
                                @if(Carbon\Carbon::parse($userMac->periode_jour->day->jour)->format('Y-m-d') > Carbon\Carbon::now()->format('Y-m-d') )
                                    <form id="userdestroy-{{$userMac->id}}" method="get" action="{{asset("/reservation/$userMac->id/effacer-info")}}" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                    </form>
                                    <a href="{{asset("/reservation/$userMac->id/effacer-info")}}"
                                       onclick="event.preventDefault();
                                               document.getElementById('userdestroy-{{$userMac->id}}').submit();"
                                       type="button"
                                       class="btn btn-warning btn-outline" style="margin: 0px 5px;">
                                        Annuler la reservation
                                    </a>
                                @endif
                            </td>

                            <td>{{ $userMac->created_at->format('d-m-Y') }}</td>
                        </tr>
                        @empty
                            <p class="btn btn-success btn-outline"> Aucune reservation vous concernant</p>
                        @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection