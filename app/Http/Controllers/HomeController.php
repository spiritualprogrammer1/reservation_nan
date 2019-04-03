<?php

//namespace App\Http\Controllers;
//
//use App\Day;
//use App\PeriodeJour;
//use App\UserMac;
//use Carbon\Carbon;
//use Illuminate\Http\Request;
//use App\TypeUser;
//class HomeController extends Controller
//{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//       // $this->middleware('auth');
//    }
//
//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index(Request $request)
//    {
//       // $type_user = TypeUser::where('id',auth()->user()->type_user_id)->first();
//      //  if ($type_user->id == TypeUser::where('libelle','admin')->first()->id || $type_user->id == TypeUser::where('libelle','super admin')->first()->id) {
//           // return redirect('/mac');
//       // }
////        if(!$type_user->autoriseAComposer){
////            auth()->guard()->logout();
////            $request->session()->invalidate();
////            return redirect('/login')->withError("Vous n'êtes pas autorisé à composer");
////        }
//        return view('home');
//    }
//
//    public function dashabord()
//    {
//
//        $userMacs = UserMac::latest();
////            ->where('user_id', auth()->user()->id);
//
//        $days = Day::where('jour', '>=', Carbon::now()->startOfWeek())
//            ->where('jour', '<=', Carbon::now()->endOfWeek())
//            ->get();
//
//        $day_id = [];
//        foreach ($days as $day) {
//            $day_id[] = $day->id;
//        }
//
//
//        $periodeJours = PeriodeJour::whereIn('day_id',$day_id)->get();
//
//        $periode_id = [];
//        foreach ($periodeJours as $periodeJour) {
//            $periode_id[] = $periodeJour->id;
//        }
//        $userMacs->whereIn('periode_jour_id', $periode_id);
//        $weekusermack=$userMacs->count();
//        /***************jour**********/
//
//        $userMacsjour = UserMac::latest();
////            ->where('user_id', auth()->user()->id);
//        $dayjour = Day::latest()
//            ->where('jour', Carbon::now()->format('Y-m-d'))
//            ->first();
//        if($dayjour != null)
//        {
//            $periodeJours = PeriodeJour::where('day_id', $dayjour->id)->get();
//
//            $periode_id = [];
//            foreach ($periodeJours as $periodeJour) {
//                $periode_id[] = $periodeJour->id;
//            }
//
//            $userMacsjour->whereIn('periode_jour_id', $periode_id);
//            $dayusermac= $userMacsjour->count();
//        }
//        else{
//            $dayusermac=0;
//        }
//
//
//        /******mois*******/
//        $userMacsmonth = UserMac::latest();
//
//        $daysmonth = Day::where('jour', '>=', Carbon::now()->startOfMonth())
//            ->where('jour', '<=', Carbon::now()->endOfMonth())
//            ->get();
//
//        $day_month = [];
//        foreach ($daysmonth as $day) {
//            $day_month[] = $day->id;
//        }
//
//
//        $periodeMois = PeriodeJour::whereIn('day_id',$day_month)->get();
//
//        $periode_ids = [];
//        foreach ($periodeMois as $periodeMoi) {
//            $periode_ids[] = $periodeMoi->id;
//        }
//        $userMacsmonth->whereIn('periode_jour_id', $periode_ids);
//        $monthusermack=$userMacsmonth->count();
//        /****total resetvation***/
//        $userMacstotal = UserMac::count();
//        return view('dashbaord',compact('weekusermack','dayusermac','monthusermack','userMacstotal'));
//    }
//}



namespace App\Http\Controllers;

use App\Day;
use App\PeriodeJour;
use App\UserMac;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\TypeUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        if(auth()->user()->isadmin==1)
        {
            return redirect()->action("HomeController@dashabord");
        }
        else {


            $days = Day::whereBetween('jour', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->get();


                $days2 = Day::whereBetween('jour', [Carbon::now()->addDays(2)->startOfWeek(), Carbon::now()->addDays(2)->endOfWeek()])
                    ->get();

            $periodes = PeriodeJour::all();
            if($days && $periodes){
                foreach ($periodes as $periode) {
                    foreach ($days as $day) {
                        if($periode->day_id == $day->id){
                            $periode->isActive = true;
                            $periode->save();
                        }

                    }
                }
            }
            if($days2 && $periodes){
                foreach ($periodes as $periode) {
                    foreach ($days2 as $day) {
                        if($periode->day_id == $day->id){
                            $periode->isActive = true;
                            $periode->save();
                        }

                    }
                }
            }

             $days = Day::where('jour', '<', Carbon::now()->format('Y-m-d'))
                ->get();


            $periodes = PeriodeJour::all();
            foreach ($periodes as $periode) {
                foreach ($days as $day) {
                    if($periode->day_id == $day->id){
                        $periode->isActive = false;
                        $periode->save();
                    }
                }
            }




            $periodeJours = PeriodeJour::where('isActive', 1)->get();


            return view('home', compact('periodeJours'));
        }


    }

    public function dashabord()
    {

        $userMacs = UserMac::latest()
            ->where('user_id', auth()->user()->id);

        $days = Day::where('jour', '>=', Carbon::now()->startOfWeek())
            ->where('jour', '<=', Carbon::now()->endOfWeek())
            ->get();

        $day_id = [];
        foreach ($days as $day) {
            $day_id[] = $day->id;
        }


        $periodeJours = PeriodeJour::whereIn('day_id',$day_id)->get();

        $periode_id = [];
        foreach ($periodeJours as $periodeJour) {
            $periode_id[] = $periodeJour->id;
        }
        $userMacs->whereIn('periode_jour_id', $periode_id);
        $weekusermack=$userMacs->count();
        /***************jour**********/

        $userMacsjour = UserMac::latest()
            ->where('user_id', auth()->user()->id);
        $dayjour = Day::latest()
            ->where('jour', Carbon::now()->format('Y-m-d'))
            ->first();
        if($dayjour != null)
        {
            $periodeJours = PeriodeJour::where('day_id', $dayjour->id)->get();

            $periode_id = [];
            foreach ($periodeJours as $periodeJour) {
                $periode_id[] = $periodeJour->id;
            }

            $userMacsjour->whereIn('periode_jour_id', $periode_id);
            $dayusermac= $userMacsjour->count();
        }
        else{
            $dayusermac=0;
        }


        /******mois*******/
        $userMacsmonth = UserMac::latest();

        $daysmonth = Day::where('jour', '>=', Carbon::now()->startOfMonth())
            ->where('jour', '<=', Carbon::now()->endOfMonth())
            ->get();

        $day_month = [];
        foreach ($daysmonth as $day) {
            $day_month[] = $day->id;
        }


        $periodeMois = PeriodeJour::whereIn('day_id',$day_month)->get();

        $periode_ids = [];
        foreach ($periodeMois as $periodeMoi) {
            $periode_ids[] = $periodeMoi->id;
        }
        $userMacsmonth->whereIn('periode_jour_id', $periode_ids);
        $monthusermack=$userMacsmonth->count();
        /****total resetvation***/
        $userMacstotal = UserMac::count();


        /*********
         *
         * reservation des macs
         */

        /*****semaine****/
        $placesweek = UserMac::latest()
        ->where('user_id','==',null);

        $daysplaceweek = Day::where('jour', '>=', Carbon::now()->startOfWeek())
            ->where('jour', Carbon::now()->format('Y-m-d'))
            ->get();

        $day_idplaceweek = [];
        foreach ($daysplaceweek as $day) {
            $day_idplaceweek[] = $day->id;
        }


        $periodeJoursplacekweek = PeriodeJour::whereIn('day_id',$day_id)->get();

        $periode_idweekplace = [];
        foreach ($periodeJoursplacekweek as $periodeJour) {
            $periode_idweekplace[] = $periodeJour->id;
        }
        $placesweek->whereIn('periode_jour_id', $periode_id);
        $weekplacekweek=$placesweek->count();

       /******jour******/

        $userMacday = UserMac::latest()
            ->where('user_id','!=',null);

        $daysmacday = Day::where('jour', Carbon::now()->format('Y-m-d'))
            ->get();

        $day_idmacday = [];
        foreach ($daysmacday as $day) {
            $day_idmacday[] = $day->id;
        }


        $periodeJoursmackday = PeriodeJour::whereIn('day_id',$day_id)->get();

        $periode_idday = [];
        foreach ($periodeJoursmackday as $periodeJour) {
            $periode_idday[] = $periodeJour->id;
        }
        $userMacday->whereIn('periode_jour_id', $periode_id);
        $dayusermackday=$userMacday->count();

        /*****total******/

        $userMactotal = UserMac::latest()
            ->where('user_id','!=',null);

        $daysmactotal = Day::get();

        $day_idmactotal = [];
        foreach ($daysmactotal as $day) {
            $day_idmactotal[] = $day->id;
        }


        $periodeJoursmacktotal = PeriodeJour::whereIn('day_id',$day_id)->get();

        $periode_idtotal = [];
        foreach ($periodeJoursmacktotal as $periodeJour) {
            $periode_idtotal[] = $periodeJour->id;
        }
        $userMactotal->whereIn('periode_jour_id', $periode_id);
        $usermacktotal=$userMactotal->count();

        /******
         * reservation sans mac (place de la cantine)
         */


        $userMacsweek = UserMac::latest()
            ->where('user_id','==',null);

        $daysmacweek = Day::where('jour', '>=', Carbon::now()->startOfWeek())
            ->where('jour', Carbon::now()->format('Y-m-d'))
            ->get();

        $day_idmacweek = [];
        foreach ($daysmacweek as $day) {
            $day_idmacweek[] = $day->id;
        }


        $periodeJoursmackweek = PeriodeJour::whereIn('day_id',$day_id)->get();

        $periode_id = [];
        foreach ($periodeJoursmackweek as $periodeJour) {
            $periode_id[] = $periodeJour->id;
        }
        $userMacsweek->whereIn('periode_jour_id', $periode_id);
        $weekusermackweek=$userMacsweek->count();

        /******jour******/

        $placeday = UserMac::latest()
            ->where('user_id','==',null);

        $daysplaceday = Day::where('jour', Carbon::now()->format('Y-m-d'))
            ->get();

        $day_idplaceday = [];
        foreach ($daysplaceday as $day) {
            $day_idplaceday[] = $day->id;
        }


        $periodeJoursplaceday = PeriodeJour::whereIn('day_id',$day_id)->get();

        $periode_idplace = [];
        foreach ($periodeJoursplaceday as $periodeJour) {
            $periode_idday[] = $periodeJour->id;
        }
        $placeday->whereIn('periode_jour_id', $periode_idplace);
        $placeday=$placeday->count();

        /*****total******/

        $placetotal = UserMac::latest()
            ->where('user_id','==',null);

        $daysplacetotal = Day::get();

        $day_idplacetotal = [];
        foreach ($daysplacetotal as $day) {
            $day_idplacetotal[] = $day->id;
        }


        $periodeJoursplacetotal = PeriodeJour::whereIn('day_id',$day_id)->get();

        $periode_idplaces = [];
        foreach ($periodeJoursplacetotal as $periodeJour) {
            $periode_idplaces[] = $periodeJour->id;
        }
        $placetotal->whereIn('periode_jour_id', $periode_idplaces);
        $placestotal=$placetotal->count();





        return view('dashbaord',compact('placestotal','placeday','weekplacekweek','usermacktotal','dayusermackday','weekusermack','weekusermackweek','dayusermac','monthusermack','userMacstotal'));
    }
}

