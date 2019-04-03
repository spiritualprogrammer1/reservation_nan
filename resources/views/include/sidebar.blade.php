<style>


.menu-sidebar{
        transition:0.5s;
    }

    .menu-sidebar:hover,
    .menu-sidebar:active,
    .menu-sidebar:focus{
        background: rgba(0, 170, 255,0.5);
        transition:0.5s;
    }

</style>




<aside class="sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="side-menu">
                @if(auth()->user()->isadmin==1)
                    <li>
                        <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li> <a href="{{url("dashabord.nan")}}">Tableau de bord</a> </li>
                            <li> <a href="{{url("newuser")}}">Nouveau utilisateur</a> </li>



                        </ul>
                    </li>
                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-equalizer fa-fw"></i> <span class="hide-menu"> Gestion des macs</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li> <a href="{{url('mac')}}">nouveau mac</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-notebook fa-fw"></i> <span class="hide-menu"> Gestion des periodes </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li> <a href="{{url('/periode')}}">periode</a> </li>
                            <li> <a href="{{url('/periode-jour')}}">periode-jour</a> </li>
                            <li> <a href="{{url('/jour')}}">jour</a> </li>
                            <li> <a href="{{url('/range')}}">range</a> </li>

                        </ul>
                    </li>

                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-grid fa-fw"></i> <span class="hide-menu"> Gestion des reservation</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li> <a href="{{url('/newreservation.nan')}}">Les reservations</a> </li>
                            <li> <a href="{{url('/reservation/les-reservation-du-jour-pour-tous')}}">Liste des reservations du jour</a> </li>
                            {{--<li> <a href="{{url('/reservation/les-reservation-faite-aujourd-hui-pour-tous')}}">  Reservations d' aujourd'hui</a> </li>--}}
                            <li> <a href="{{url('/reservation/les-reservation-de-la-semaine-pour-tous')}}"> Reservations de la semaine</a> </li>
                            <li> <a href="{{url('/reservation.nan')}}">Recherche avancée</a> </li>


                        </ul>
                    </li>
                @else




                <li >
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-layers fa-fw"></i> <span class="hide-menu"> reservation</span></a>
                    <ul  aria-expanded="false" class="collapse">

                        <li> <a href="{{url('/home')}}">Nouvelle reservation</a> </li>
                        <li> <a href="{{url('/reservation/reservation-sans-mac')}}">Nouvelle reservation place</a> </li>
                        <li> <a href="{{url('/reservation/mes-reservation')}}">mes reservations</a> </li>
                        <li> <a href="{{url('/reservation/mes-reservation-du-jour')}}">Mes reservations du jour</a> </li>
                        {{--<li> <a href="{{url('/reservation/mes-reservation-faite-aujourd-hui')}}">reservation d' aujourd'hui</a> </li>--}}
                        <li> <a href="{{url('/reservation/mes-reservation-de-la-semaine')}}"> reservations de la semaine</a> </li>


                    </ul>
                </li>

                @endif

            </ul>
        </nav>
    </div>
</aside>



