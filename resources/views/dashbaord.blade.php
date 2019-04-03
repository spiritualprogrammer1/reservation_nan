@extends('layout.master')

@section('content')

<style>
    .box{
        display:flex;
        justify-content: center;
        align-items: center;
        min-height:70vh;
    }


</style>


<div class="box">
    <div class="row colorbox-group-widget ">
        <div class="col-md-3 col-sm-4  col-lg-4 info-color-box">
            <div class="white-box" >
                <div class="media bg-primary">
                    <div class="media-body">
                        <h3 class="info-count " style="font-size:60px; padding-bottom:20px;">{{$userMacstotal}} <span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline" ></i></span></h3>
                        <p class="info-text" style="font-size:16px;">Total reservation</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-success">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$dayusermac}} <span class="pull-right"><i class="icon-bag"></i></span></h3>
                        <p class="info-text " style="font-size:16px;">Total reservation du jour</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-info">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$weekusermack}} <span class="pull-right"><i class="icon-calender"></i></span></h3>
                        <p class="info-text " style="font-size:16px;">Total reservation de la semaine</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-warning">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$weekusermackweek}} <span class="pull-right"><i class="icon-calender"></i></span></h3>
                        <p class="info-text " style="font-size:16px;">Total reservation Macs de la semaine</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-danger">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$dayusermackday}} <span class="pull-right"><i class="icon-calender"></i></span></h3>
                        <p class="info-text " style="font-size:16px;">Total reservation Macs du mois</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-warning">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$usermacktotal}} <span class="pull-right"><i class="icon-calender"></i></span></h3>
                        <p class="info-text " style="font-size:16px;">Total reservation Macs </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-success">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$usermacktotal}} <span class="pull-right"><i class="icon-calender"></i></span></h3>
                        <p class="info-text " style="font-size:16px;">Total reservation Macs </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-info">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$placeday}} <span class="pull-right"><i class="icon-calender"></i></span></h3>
                        <p class="info-text " style="font-size:16px;">Total reservation a la cantine du jour </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-primary">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$weekplacekweek}} <span class="pull-right"><i class="icon-calender"></i></span></h3>
                        <p class="info-text " style="font-size:16px;">Total reservation a la cantine de la semaine </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-info">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$placestotal}} <span class="pull-right"><i class="icon-calender"></i></span></h3>
                        <p class="info-text " style="font-size:16px;">Total reservation a la cantine </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-lg-4 info-color-box">
            <div class="white-box">
                <div class="media bg-success">
                    <div class="media-body">
                        <h3 class="info-count" style="font-size:60px;padding-bottom:20px;">{{$monthusermack}} <span class="pull-right"><i class="icon-calender"></i></span></h3>
                        <p class="info-text"  style="font-size:16px;">Total reservation du mois</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection