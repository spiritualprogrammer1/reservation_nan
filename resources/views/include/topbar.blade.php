<nav class="navbar navbar-default navbar-static-top m-b-0" ">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part">
            {{--<a class="logo" href="index.html">--}}
                {{--<b>--}}
                    {{--<img src="../plugins/images/logo.png" alt="home" />--}}
                {{--</b>--}}
                {{--<span>--}}
                            {{--<img src="../plugins/images/logo-text.png" alt="homepage" class="dark-logo" />--}}
                        {{--</span>--}}
            {{--</a>--}}
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li>
                {{--<form role="search" class="app-search hidden-xs">--}}
                    {{--<i class="icon-magnifier"></i>--}}
                    {{--<input type="text" placeholder="Search..." class="form-control">--}}
                {{--</form>--}}
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                    <i class="icon-user"></i>
                </a>
                <ul class="dropdown-menu mailbox animated bounceInDown">
                    <li>
                        <div class="drop-title text-success"><a href="{{route('profile.nan')}}">{{auth()->user()->name}}  <i class="fa fa-user text-info"></i> </a> </div>
                    </li>
                    <li>

                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                    <i class="icon-logout text-danger"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                    <li>
                        <a href="javascript:void(0);">
                            <div>
                                <p>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <strong>deconnexion</strong></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                                </p>
                            </div>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</nav>