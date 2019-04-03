@extends('layout.master')

@section('content')

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
                            <th>Etudiant</th>
                            <th>Date jour</th>
                            <th>Periode</th>
                            <th>Numero Mac</th>
                            <th> <i class="fa fa-times"></i> Action</th>
                            <th>Enregistré le:</th>

                        </tr>
                        </thead>

                        <tbody>
                        @forelse ($userMacs as $key=> $userMac)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$userMac->user->name}}</td>
                                <td class="btn btn-primary disabled">{{\Carbon\Carbon::parse($userMac->periode_jour->day->jour)->toFormattedDateString()}}</td>
                                <td class="text-danger">{{$userMac->periode_jour->periode->heureDebut}} H  a  {{ $userMac->periode_jour->periode->heureFin }} H	</td>
                                <td>{{ $userMac->mac->numMac ?? 'A la cantine' }}</td>
                                <td>
                                    {{--@if(Carbon\Carbon::parse($userMac->periode_jour->day->jour)->format('Y-m-d') > Carbon\Carbon::now()->format('Y-m-d') )--}}

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
                                    {{--@endif--}}
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