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