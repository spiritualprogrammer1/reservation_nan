@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class="user-bg">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)"><img src="{{asset("public/images/logonan.png")}}" class="thumb-lg img-circle" alt="img"></a>
                            <h4 class="text-white">{{auth()->user()->name}}</h4>
                            <h5 class="text-white">{{auth()->user()->email}}</h5> </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">

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
                <ul class="nav nav-tabs tabs customtab">
                    <li class="active tab">
                        <a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Modifier votre mot de passe</span> </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <form method="post"  action="{{route("profilesave")}}" class="form-horizontal form-material">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label class="col-md-12">Nouveau Password</label>
                                <div class="col-md-12">
                                    <input type="password"  name="password" class="form-control form-control-line  " placeholder="entrer le mot de passe" required > </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- ===== Right-Sidebar ===== -->
    <div class="right-sidebar">

@endsection