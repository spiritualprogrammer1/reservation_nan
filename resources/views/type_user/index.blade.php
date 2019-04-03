@extends('layout.master')

@section('content')
<div class="card">
    <div class="panel">
            <div class="panel panel-heading" style="margin-bottom: 40px;"><h3 class="text-center text-danger"> <u>Créer un type utilisateur</u>  <i class="fa fa-user"></i> <i></i> </h3></div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif

            {!! Form::open(['route' => 'type_user.store']) !!}

            <div class="">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6" > <b>Libelle</b>
                        <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-comments-o"></i> </span>
                            <div class="form-line">
                                <input type="text" name="libelle" class="form-control date" placeholder="Entre le libelle">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"> <b>Groupe </b>
                        <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-group"></i> </span>
                            <div class="form-line">
                                <input type="text" name="groupe" class="form-control time24" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"> <b>Equipe </b>
                        <div class="input-group"> <span class="input-group-addon"> <i class="fa  fa-user"></i> </span>
                            <div class="form-line">
                                <input type="text" name="equipe" class="form-control time12" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"> <b>nbre de reservation/semaine</b>
                        <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-database"></i> </span>
                            <div class="form-line">
                                <input type="text" name="nbreHeure" class="form-control datetime" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"> <b>Est autorisé a reservé</b>
                        <div class="input-group input-group-lg"> <span class="input-group-addon">
                                <input type="checkbox" name="autoriseAComposer" class="check" id="minimal-checkbox-2" checked>
                                    <label for="ig_checkbox"></label>
                                    </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="input-group input-group-lg">
                            <br>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i></button>
                        </div>

                    </div>

                </div>
            </div>

            {!! Form::close() !!}

    </div>

    <div class="panel panel-heading" style="margin-bottom: 40px;"><h3 class="text-center text-info"> <u>Liste des types utilisateurs</u> <i class="fa fa-users"></i>  </h3></div>

    <div class="table-responsive panel panel-body">
        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Libelle</th>
                <th>Nbre de reservation / semaine</th>
                <th>groupe</th>
                <th>equipe</th>
                <th>Etat reservation</th>
                <th>Action </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($typeUsers as $typeUser)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$typeUser->libelle}}</td>
                    <td>{{$typeUser->nbreHeure}}</td>
                    <td>{{$typeUser->groupe}}</td>
                    <td>{{$typeUser->equipe}}</td>
                    <td>
                        @if($typeUser->autoriseAComposer)
                            <span class="label label-success">Autoriser</span>
                        @else
                            <span class="label label-danger">Non Autoriser</span>
                        @endif
                    </td>
                    <td>
                        {{--<a type="" class="" href="{{asset("/type_user/$typeUser->id/visioner-info")}}"><i class="material-icons">remove_red_eye</i></a>--}}
                        <a type="" class="" href="{{asset("/type_user/$typeUser->id/editer-info")}}"><i class="fa fa-edit"></i></a>
                        <form id="type_userdestroy-{{$typeUser->id}}" method="get" action="{{asset("/type_user/$typeUser->id/effacer-info")}}" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                        </form>
                        <a href="{{asset("/type_user/$typeUser->id/effacer-info")}}"
                           onclick="event.preventDefault();
                                   document.getElementById('type_userdestroy-{{$typeUser->id}}').submit();"
                           class="" style="margin: 0px 5px;">
                            <i class="fa fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection