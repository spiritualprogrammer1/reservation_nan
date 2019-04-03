@extends('layout.master')

@section('content')


    <div class="row clearfix card">
        <br>
        <h3 class="text-center text-info" style="border-top: 50px">
            Visioner les information du range  <i class="material-icons">today</i>
            <a  class="btn  btn-raised bg-indigo waves-effect pull-right" href="{{asset("/range")}}">Retour</a>
        </h3>
        <div class="col-md-12">

            <div class="body">
                <div class="">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6"> <b>Date Debut</b>
                            <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">date_range</i> </span>
                                <div class="form-line">
                                    <input type="text" class="form-control date" value="{{$range->dateDebut}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6"> <b>Date Fin</b>
                            <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">date_range</i> </span>
                                <div class="form-line">
                                    <input type="text" class="form-control date" value="{{$range->dateFin}}" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection