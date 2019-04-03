<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMac;
use App\Mac;
use App\Day;
use App\User;
use App\TypeUser;
use App\PeriodeJour;
use Carbon\Carbon;

class UserMacController extends Controller
{

    //debut modification
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *reservation sans mac debut
     */

    public function reservationSansMac(Request $request)
    {
        /**
         *verifie si on est au debut de semaine et active les periode jour correspondant a cette semaine
         */

//        if(Carbon::now()->equalTo(Carbon::now()->startOfWeek()))
//        {
            $days = Day::where('jour', '>=', Carbon::now()->startOfWeek())
                ->where('jour', '<', Carbon::now())
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
//        }

        /**
         *verifie le jour est passe pour desactiver les periode jours
         */

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

        /**
         *liste des periodes jour active
         */

        $periodeJours = PeriodeJour::where('isActive', 1)->get();
        return view('reservation-sans-mac', compact('periodeJours'));
    }

    /**
     *reservation sans mac debut
     */

    /**
     * @param Request $request
     */
    public function index(Request $request){

        /**
         *verifie le jour est passe pour desactiver les reservations active
         */

        $userMacs = UserMac::latest();
        $days = Day::where('jour', '<', Carbon::now())
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
        $userMacs->whereIn('periode_jour_id', $periode_id)->get();
        foreach ($userMacs as $userMac) {
            $userMac->isActive = false;
            $userMac->save();
        }

        //recherche avancée
        $userMacs = $this->recherche($request->user_id, $request->mac_id, $request->periode_jour_id, $request->dateDebut, $request->dateFin);
        $users = User::all();
        $macs = Mac::orderBy('numMac','asc')->pluck('numMac','id');
        $periodeJours = PeriodeJour::orderBy('id','desc')->get();
        $tabs = [];
        foreach ($periodeJours as $periodeJour) {
            $tabs[$periodeJour->id] = Carbon::parse($periodeJour->day->jour)->toFormattedDateString().' '.Carbon::parse($periodeJour->periode->heureDebut)->format('h:i').' '.Carbon::parse($periodeJour->periode->heureDebut)->format('h:i');
        }

        return view('user_mac.index')
            ->with([
                'users' => $users,
                'userMacs' => $userMacs,
                'tabs'=> $tabs,
                'macs'    => $macs
            ]);
    }

    public function recherche($a, $b, $c, $d, $e){
        $userMacs = UserMac::latest();
        $days = Day::latest();

        if($a || $b || $c || $d || $e){
            if($a){
                $userMacs->where('user_id', $a);
            }
            if($b){
                $userMacs->where('mac_id', $b);
            }
            if($c){
                $userMacs->where('periode_jour_id', $c);
            }
            if($d || $e){
                if($d){
                    $days->where('jour', '>=', $d);

                }
                if($e){
                    $days->where('jour', '<=', $e);
                }
                $day_id = [];
                foreach ($days->get() as $day) {
                    $day_id[] = $day->id;
                }

                $periodeJours = PeriodeJour::whereIn('day_id',$day_id)->get();

                $periode_id = [];
                foreach ($periodeJours as $periodeJour) {
                    $periode_id[] = $periodeJour->id;
                }

                $userMacs->whereIn('periode_jour_id', $periode_id);
            }
        }
        return $userMacs->get();
    }

    /**
     * @param Request $request
     */
    public function mesReservation(){
        $userMacs = UserMac::latest()
            ->where('user_id', auth()->user()->id)->get();
        return view('user_mac.mesReservation',compact('userMacs'));
    }

    /**
     *les reservations de tous le monde cette semaine
     */

    public function mesReservationSemaineEveryOne(){
        $userMacs = UserMac::latest();

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
        return view('user_mac.reservation')->with(['userMacs' => $userMacs->get()]);
    }
    /**
     *les reservations de tous le monde ce jour
     */

    public function mesReservationJourEveryOne(){
        $userMacs = UserMac::latest();
        $day = Day::latest()
            ->where('jour', Carbon::now()->format('Y-m-d'))
            ->first();

        if($day !=null)
        {
            $periodeJours = PeriodeJour::where('day_id', $day->id)->get();
            $periode_id = [];
            foreach ($periodeJours as $periodeJour) {
                $periode_id[] = $periodeJour->id;
            }
            $userMacs->whereIn('periode_jour_id', $periode_id);
        }






        return view('user_mac.reservation')->with(['userMacs' => $userMacs->get()]);
    }

    public function mesReservationSemaine(){
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
        return view('user_mac.mesReservation')->with(['userMacs' => $userMacs->get()]);
    }

    public function mesReservationJour(){
        $userMacs = UserMac::latest()
            ->where('user_id', auth()->user()->id);
        $day = Day::latest()
            ->where('jour', Carbon::now()->format('Y-m-d'))
            ->first();

        if($day !=null) {

        $periodeJours = PeriodeJour::where('day_id', $day->id)->get();

        $periode_id = [];
        foreach ($periodeJours as $periodeJour) {
            $periode_id[] = $periodeJour->id;
        }
            $userMacs->whereIn('periode_jour_id', $periode_id);
        }



        return view('user_mac.mesReservation')->with(['userMacs' => $userMacs->get()]);
    }

    /**
     *mes reservations realiser today
     */

    public function mesReservationToday(){
        $userMacs = UserMac::where('created_at', Carbon::now()->format('Y-m-d'))
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('user_mac.mesReservation')->with(['userMacs' => $userMacs]);
    }

    /**
     *mes reservations realiser today pour tous le monde
     */
    public function mesReservationTodayEveryOne(){

        $userMacs = UserMac::latest()
            ->where('created_at', Carbon::now()->format('Y-m-d'))
            ->get();

        return view('user_mac.reservation')->with(['userMacs' => $userMacs]);
    }


    public function create(){
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){


        //dd($userMac);
        //$type =  TypeUser::where('id', $user['type_user_id'])->first()->toArray();
        /*******reservation de la semaine****/



        /***************semaine suivante**************************
         *
         *
         * */

        $periodesjours = PeriodeJour::findOrFail(request('periode_jour_id'));

        $dates = $periodesjours->day->jour;
        $datescar = new Carbon($dates);

        $datescar->isNextWeek();




      /*  $days = Day::where('jour', '>=', Carbon::now()->startOfWeek())
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

        $userMac = UserMac::where('user_id',request('user_id'))
            ->whereIn('periode_jour_id', $periode_id)
            ->get();

        */




        /********************************/


        //if($userMac->count() 1 > $type['nbreHeure'] ){

        if( $datescar->isNextWeek() == true)
        {
            $user =  User::where('id', request('user_id'))->first()->toArray();

            $days = Day::where('jour', '>=', Carbon::parse('next Monday')->toDateString())
                ->where('jour', '<=', Carbon::parse('next Friday')->toDateString())
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

            $userMac = UserMac::where('user_id',request('user_id'))
                ->whereIn('periode_jour_id', $periode_id)
                ->get();


            if($userMac->count()  >= 1 ){
                return back()->withError("Vous avez déjà atteint votre quota");
            }
            else {
                UserMac::create([
                    'user_id'   =>  request('user_id'),
                    'periode_jour_id'   =>  request('periode_jour_id'),
                    'mac_id'    =>  request('mac_id'),
                    'isActive'  => 1
                ]);
                if(UserMac::where('periode_jour_id',request('periode_jour_id'))->get()->count() == Mac::where('isActive', true)->get()->count() + 20){
                    PeriodeJour::where('id', request('periode_jour_id'))->update([
                        'isActive'  => false
                    ]);
                }
                return redirect()->action('HomeController@index')->withSuccess("Vous avez reserver un mac");
            }
        }
        else{
            $user =  User::where('id', request('user_id'))->first()->toArray();

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

            $userMac = UserMac::where('user_id',request('user_id'))
                ->whereIn('periode_jour_id', $periode_id)
                ->get();

            if($userMac->count()  >= 1 ){
                return back()->withError("Vous avez déjà atteint votre quota");
            }
            else {
                UserMac::create([
                    'user_id'   =>  request('user_id'),
                    'periode_jour_id'   =>  request('periode_jour_id'),
                    'mac_id'    =>  request('mac_id'),
                    'isActive'  => 1
                ]);
                if(UserMac::where('periode_jour_id',request('periode_jour_id'))->get()->count() == Mac::where('isActive', true)->get()->count() + 20){
                    PeriodeJour::where('id', request('periode_jour_id'))->update([
                        'isActive'  => false
                    ]);
                }
                return redirect()->action('HomeController@index')->withSuccess("Vous avez reserver un mac");
            }


        }
    }
    /**
     * @param Request $request
     * @param UserMac $userMac
     */
    public function show(Request $request, UserMac $userMac){

        if(!$userMac){
            return back()->withError("La reservation n'existe pas");
        }
        $users = User::all()->pluck('name','id');
        $macs = Mac::orderBy('numMac','asc')->pluck('numMac','id');
        $periodeJours = PeriodeJour::orderBy('id','desc')->get();
        $usermac = UserMac::findOrFail($userMac->id);
        $tabs = [];
        foreach ($periodeJours as $periodeJour) {
            $tabs[$periodeJour->id] = Carbon::parse($periodeJour->day->jour)->toFormattedDateString().' '.Carbon::parse($periodeJour->periode->heureDebut)->format('h:i').' '.Carbon::parse($periodeJour->periode->heureDebut)->format('h:i');
        }

        return view('user_mac.show')->with([
            'users' => $users,
            'userMac' => $userMac,
            'tabs'=> $tabs,
            'macs'    => $macs,
            'usermac'=>$usermac
        ]);
    }
    //fin modification
    /**
     * @param Request $request
     * @param PeriodeJour $periodeJour
     */
    public function showPeriode(Request $request, PeriodeJour $periodeJour){
        
		if(!$periodeJour){
            return back()->withError("La periode n'existe pas");
        }
        $macsPeriode = UserMac::where('periode_jour_id', $periodeJour->id)->get();
        $mac_id = [];
		foreach ($macsPeriode as $macPeriode) {
			if($macPeriode->mac_id == null){
				;
			}else{
				$mac_id[] = $macPeriode->mac_id;
			}
        }
		//dd($mac_id);
        $macs = Mac::where('isActive',true)
            ->whereNotIn('id',$mac_id)
            ->orderBy('numMac')
            ->get();
			
		return view('select-mac', compact('macs','periodeJour'));
    }

    /**
     * @param Request $request
     * @param UserMac $userMac
     */
    public function edit(Request $request, UserMac $userMac){

    }

    /**
     * @param Request $request
     * @param UserMac $userMac
     */
    public function update(Request $request, UserMac $userMac){

    }

    /**
     * @param Request $request
     * @param UserMac $userMac
     */
    public function destroy(Request $request, UserMac $userMac){
        if(!$userMac){
            return back()->witError("La reservation n'existe pas");
        }
        $periode = PeriodeJour::where('id',$userMac->periode_jour_id)->first();
        $day = Day::where('id', PeriodeJour::where('id', $userMac->periode_jour_id)->first()->day_id)->first();
        $userMac->delete();
        if(Carbon::now()->format('Y-m-d') < Carbon::parse($day->jour)->format('Y-m-d')){
            if(!$periode->isActive){
                $periode->update([
                    'isActive'  => true
                ]);
            }
        }

        return back()->withSuccess("Reservation annulée avec succès");
    }

    public function reservationsearch($id)
    {
        $macsPeriode = UserMac::where('periode_jour_id', $id)->get();

        $mac_id = [];

        foreach ($macsPeriode as $macPeriode) {
        	if($macPeriode->mac_id == null){
				;
			}else{
				$mac_id[] = $macPeriode->mac_id;
			}
        }


        $macs = Mac::where('isActive',true)
            ->whereNotIn('id',$mac_id)
            ->orderBy('numMac')
            ->get();
        $periodeJour= PeriodeJour::findOrFail($id);

        return view('select-mac-real', compact('macs','periodeJour'));

    }

    public function  reservationsearchcantine(Request $request){

        /**
         *verifie si on est au debut de semaine et active les periode jour correspondant a cette semaine
         */

//        if(Carbon::now()->equalTo(Carbon::now()->startOfWeek()))
//        {
        $days = Day::where('jour', '>=', Carbon::now()->startOfWeek())
            ->where('jour', '<', Carbon::now())
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
//        }

        /**
         *verifie le jour est passe pour desactiver les periode jours
         */

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

        /**
         *liste des periodes jour active
         */

        $periodeJours = PeriodeJour::where('isActive', 1)->get();

        return view('user_mac.reservation-sans-mac-real', compact('periodeJours'));

    }
}
