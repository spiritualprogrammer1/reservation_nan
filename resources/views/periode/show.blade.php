@extends('layout.master')

@section('content')


    <div class="">
        <div class="panel">
            @if(session('success'))
                <div class="panel panel-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="panel panel-danger">
                    {{session('error')}}
                </div>
            @endif
        </div>
        <div class="panel panel-heading"><h2 class="text-center "> <i>  <u>Détails la periode </u> </i> </h2></div>
        <div class="panel panel-body">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">

                        <div class="row clearfix">


                            <div class="col-lg-3 col-md-6"> <b class="text-danger">Date debut</b>
                                <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">date_range</i> </span>
                                    <div class="form-line">
                                        <input type="text" name="dateDebut"  value="{{$periode->heureDebut}}" class="form-control date text-info"  disabled >
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6"> <b class="text-danger"> Date fin</b>
                                <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">date_range</i> </span>
                                    <div class="form-line">
                                        <input type="text"  name="dateFin" value="{{$periode->heureFin}}" class="form-control date text-info"  disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6"> <b class="text-danger">Etat</b>
                                <div class="input-group"> <span class="input-group-addon"> <i class="material-icons"> local_activity</i> </span>
                                    <div class="">
                                        @if($periode->isActive)
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
    </div>





@endsection