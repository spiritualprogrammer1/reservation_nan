@extends('layout.master')

@section('content')


    <div class="card">
        <h3 class="text-center text-info maj">Faite vos reservations</h3>
    </div>


    @if (session('success'))
        <div class="text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif
    <section class=" ecommerce-page">
        <div class="block-header">
            <div style="margin: 0px 20px;" class="text-center"><h1>{{\Carbon\Carbon::parse($periodeJour->day->jour)->toFormattedDateString()}}</h1></div>
        </div>

        <div class="row el-element-overlay">
            <!-- /.usercard -->
            <div class="" id="contentmac">
            @foreach ($macs as $mac)

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1"> <img src="{{asset('images/macs.jpg')}}" />
                        </div>
                        <div class="el-card-content">
                            <form id="mac-{{$mac->id}}" method="post" action="{{url('/reserver')}}" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                {!! Form::number('mac_id', $mac->id,null) !!}
                                {!! Form::number('user_id', auth()->user()->id,null) !!}
                                {!! Form::number('periode_jour_id', $periodeJour->id,null) !!}
                            </form>
                            <h5 class="btn">Imac<a href="#" class="">: &nbsp; N°<span class="text-info "> <b class="num">{{$mac->numMac}}</b> </span>&nbsp;&nbsp;</a>
                                <a href="javascript:void(0);"  onclick="event.preventDefault();document.getElementById('mac-{{$mac->id}}').submit();" class="btn btn-block btn-outline btn-rounded btn-primary "><i class="fa fa-hand-o-right"></i> <b>Reserver</b></a>


                            </h5>

                        </div>
                    </div>
                </div>
            </div>

                @endforeach

            </div>

        </div>




    </section>


@endsection
@section('script')
<script>
        var id = {{$periodeJour->id}}


        function realselectmac()
        {
            $.get('../../reservationsearch/' + id, function (data) {
                $('#contentmac').html(data);
                console.log("hello")

            })
        }


        setInterval(realselectmac, 4000);
</script>
@endsection



