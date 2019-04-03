
    @foreach ($periodeJours->chunk(3) as $itemChunck)

        @foreach ($itemChunck as $item)
            @if(20 - \App\UserMac::where('periode_jour_id', $item->id)->where('mac_id',null)->count() >=  0)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
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
