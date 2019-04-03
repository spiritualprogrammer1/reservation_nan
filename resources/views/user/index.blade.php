@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class=""> <u>Gestion des Utilisateurs</u> <i class="fa fa-spin fa-circle-o-notch text-danger"></i> </h2>
        </div>

    </div>

    <div class="container-fluid">
        @if(session('success'))
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="alert alert-success col-md-8 ">
                    <strong> <i class="fa  fa-thumbs-o-up"></i>! </strong>  <b>Traitement Effectuer avec succès</b> </div>

            </div>
        @endif
        @if(session('error'))

            <div class="alert alert-danger">
                {{session('error')}}
            </div>
    @endif
    <!--.row-->
        <div class="row">
            <div class="col-md-4">
                <div class="white-box">
                    <h3 class="box-title m-b-0 panel-info text-default"> <u>Nouveau utilisateur <i class="ti-user text-danger"></i> </u> </h3>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            {!! Form::open(['route' => 'newusers']) !!}
                            <div class="form-group col-md-12 {!! $errors->has('name') ? 'has-error' : '' !!}">
                                <label for="exampleInputuname">Nom et prenom</label>
                                <div class="input-group ">
                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                    <input type="text"  name="name" class="form-control" id="exampleInputuname" placeholder="Nom et prenom"> </div>
                                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-12 {!! $errors->has('email') ? 'has-error' : '' !!}">
                                <label for="exampleInputuname">Email</label>
                                <div class="input-group ">
                                    <div class="input-group-addon"><i class="ti-email"></i></div>
                                    <input type="email"  name="email" class="form-control" id="exampleInputuname" placeholder="Entre le mail"> </div>
                                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                            </div>

                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light m-r-10"><i class="fa fa-save"></i></button>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading"> Liste des utilisateurs <i class=" fa fa-clone"></i> </div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">

                        <div class="white-box">

                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom et prenom</th>
                                        <th>Email</th>
                                        <th>crée le</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td class="text-info">{{$user->email}}</td>
                                            <td class="">{{$user->created_at->format('d/m/y')}}</td>
                                            {{--<td>--}}
                                            {{--@if($user->isActive)--}}
                                            {{--<span class="label label-success">Activer</span>--}}
                                            {{--@else--}}
                                            {{--<span class="label label-danger">Desactiver</span>--}}
                                            {{--@endif--}}
                                            {{--</td>--}}
                                            <td>
                                                {{--<a type="button" class="btn btn-primary" href="/user/{{$user->id}}/visioner-info">Voir</a>--}}
                                                <a type="button" class="text-success" href="{{url("/user/$user->id/editer-info")}}">Editer</a>
                                                <form id="userdestroy-{{$user->id}}" method="get" action="{{url("/user/$user->id/effacer-info")}}" style="display: none;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                </form>
                                                <a href="{{url("/user/$user->id/effacer-info")}}"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('userdestroy-{{$user->id}}').submit();"
                                                   type="button"
                                                   class="text-danger" style="margin: 0px 5px;">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection