@extends('layout.master')

@section('content')


    <div class="card panel panel-heading text-center"><h3 class="btn  btn-raised bg-blue-grey waves-effect" style="margin-left: 70px;font-style: italic;font-weight: bold"> <i>  <u>Détail de la reservation </u> </i> </h3></div>
    <div class="panel panel-bodys card ">





    <div class="card ">


        <div class="col-md-12">

            <div class="body">
                <div class="">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6"> <b class="">Etudiant</b>
                            <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">person</i> </span>
                                <div class="form-line text-info">
                                    <input type="text" value="{{$usermac->user->name}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6"> <b>Mac <i></i> </b>
                            <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">desktop_mac</i> </span>
                                <div class="form-line">
                                    <input type="text" value="{{$usermac->mac->numMac}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6"> <b>Periode <i></i> </b>
                            <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">date_range</i> </span>
                                <div class="form-line">
                                    <input type="text" class="text-danger" value="{{$usermac->periode_jour->periode->heureDebut }} {{$usermac->periode_jour->day->jour}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6"> <b>Etat <i></i> </b>
                            <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">done_all</i> </span>
                                <div class="form-line">
                                    @if($userMac->isActive)
                                        <span class="label label-success">Activer</span>
                                    @else
                                        <span class="label label-danger">Desactiver</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection