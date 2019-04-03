<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('logo-nan.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown">NAN APP</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
                <ul class="dropdown-menu slideUp">
                    <li><a href="profile.html"><i class="material-icons">person</i>Profile</a></li>
                    <li class="divider"></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="material-icons">input</i>Deconnexion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </li>
                </ul>
            </div>
            <div class="email">{{auth()->user()->name}}</div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header"></li>
            <li class="active open"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                <ul class="ml-menu">
                    <li class="active"><a href="{{url('dashabord.nan')}}">tableau de bord</a> </li>

                </ul>
            </li>


            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Gestion des macs</span> </a>
                <ul class="ml-menu">
                    <li> <a href="{{url(asset('mac'))}}">nouveau mac</a></li>

                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>Gestion des jours</span> </a>
                <ul class="ml-menu">
                    <li> <a href="{{url(asset('/jour'))}}">jour</a> </li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Gestion des periodes</span> </a>
                <ul class="ml-menu">
                    <li> <a href="{{url(asset('/jour'))}}">periode</a> </li>
                    <li> <a href="{{url(asset('/periode-jour'))}}">periode-jour</a> </li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-image"></i><span>Gestion des ranges</span> </a>
                <ul class="ml-menu">
                    <li> <a href="{{url(asset('/range'))}}">range</a> </li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>reservation</span> </a>
                <ul class="ml-menu">
                    <li> <a href="{{url(asset('/newreservation.nan'))}}">Nouvelle reservation</a> </li>
                    <li> <a href="{{url(asset('/reservation/mes-reservation'))}}">mes reservations</a> </li>
                    <li> <a href="{{url(asset('/reservation/mes-reservation-du-jour'))}}">Mes reservations du jour</a> </li>
                    <li> <a href="{{url(asset('/reservation/mes-reservation-de-la-semaine'))}}">Mes reservations de la semaine</a> </li>
                    <li> <a href="{{url(asset('/reservation.nan'))}}">Recherche avancée</a> </li>



                </ul>
            </li>

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">deconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>