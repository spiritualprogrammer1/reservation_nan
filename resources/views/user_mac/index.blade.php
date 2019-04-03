@extends('layout.master')

@section('content')


    <div class="card panel panel-heading text-center"><h1 class="btn  btn-raised bg-blue-grey waves-effect" style="margin-left: 70px;font-style: italic;font-weight: bold;font-size: 35px"> <i>  <u>Recherche avancé sur les reservations</u> </i> </h1></div>
    <div class="panel panel-bodys card ">



        <div class="panel panel-body">
            <div class="col-md-12">
                {!! Form::open(['url' => 'reservation.nan', 'method' => 'get']) !!}

                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 focused warning">
                        <select class="form-control show-tick" data-live-search="true">
                            <option value="" selected disabled>Selectionner un utilsateur</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-lg-6 col-md-6 focused warning">
                        {!! Form::select('periode_jour_id', $tabs, null, ['class'   =>  'form-control', 'placeholder' => 'Selectionner une periode']) !!}
                        {!! $errors->first('periode_jour_id', '<small class="help-block">:message</small>') !!}

                    </div>
                </div>

                <div class="row clearfix demo-masked-input">

                    <div class="col-lg-12 text-center">
                        <br><br>
                        <span class="text-center text-info" style="font-family: italic;font-weight: bold;font-size: 20px"> <u>Recherche entre deux dates</u> </span>
                        <hr>
                    </div>
                    <div class="col-lg-4 col-md-6 "> <b>Date Debut</b>
                        <div class="input-group"> <span class="input-group-addon"> <i class="icon-calender"></i> </span>
                            <div class="form-line">
                                <input type="text"  id="datepicker-autoclose" name="dateDebut"  class="form-control date" placeholder="Ex: 30/07/2016">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6"> <b>Date Fin</b>
                        <div class="input-group"> <span class="input-group-addon"> <i class="icon-calender"></i> </span>
                            <div class="form-line">
                                <input type="text"  name="dateFin"  id="datepicker-autocloses" class="form-control date" placeholder="Ex: 30/07/2016">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <br>
                        <div class="input-group">
                            <button type="type" class="btn btn-success btn-rounded"> <i class="fa fa-search"></i> </button>

                        </div>
                    </div>
                </div>


                {!! Form::close() !!}


            </div>
        </div>



        <hr class="text-warning">


      <div class="panel panel-body">
          <div class="col-md-12 text-center">
              <span class="text-info"> <u style="font-size: 28px">Resultat des recherches</u> </span>
              <br/>
          </div>





          <div class="col-md-12">

              <div class="table-responsive">
                  <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th>Id</th>
                          <th>Etudiant</th>
                          <th>Jour</th>
                          <th>Periode</th>
                          <th>Etat</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>


                      @forelse ($userMacs as $userMac)
                          <tr xl-blue>
                              <td>{{$loop->index + 1}}</td>
                              <td>{{$userMac->user->name}}</td>
                              <td>{{\Carbon\Carbon::parse($userMac->periode_jour->day->jour)->toFormattedDateString()}}</td>
                              <td>De {{$userMac->periode_jour->periode->heureDebut}}h a {{$userMac->periode_jour->periode->heureFin}} h</td>
                              <td>
                                  @if($userMac->isActive)
                                      <span class="label label-success">Activer</span>
                                  @else
                                      <span class="label label-danger">Desactiver</span>
                                  @endif
                              </td>
                              <td>
                                  {{--<a  class="" href="/reservation/{{$userMac->id}}/visioner-info"><i class="material-icons text-info">remove_red_eye</i></a>--}}
                                  <form id="userdestroy-{{$userMac->id}}" method="get" action="{{url("/reservation/$userMac->id/effacer-info")}}" style="display: none;">
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                  </form>
                                  <a href="{{url("/reservation/$userMac->id/effacer-info")}}"
                                     onclick="event.preventDefault();
                                             document.getElementById('userdestroy-{{$userMac->id}}').submit();"

                                     class="" style="margin: 0px 5px;">
                                      <i class="fa fa-trash"></i>
                                  </a>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="6" class="text-center">
                                  <span class="text-warning text-center" >Il y a aucun élément qui correspond a cette demande <i class="material-icons">report_problem</i></span>
                              </td>
                          </tr>
                      @endforelse

                      </tbody>
                  </table>
              </div>



          </div>
      </div>



    </div>





@endsection