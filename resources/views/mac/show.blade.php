@extends('layout.master')

@section('content')



        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Information Détaillée
                    </h2>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="col-md-6">
                                <label for="">Numero du mac :  <h4 class="text-danger">{{$mac->numMac}}</h4>   </label>
                            </div>
                            <div class="col-md-4">
                                <span>Etat  : </span>
                                @if($mac->isActive)
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



@endsection