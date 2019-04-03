<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;

class DayController extends Controller
{
    public function index(){
        $days = Day::all();
        return view('day.index', compact('days'));
    }

    public function create(){
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        //
    }

    /**
     * @param Request $request
     * @param Day $day
     */
    public function show(Request $request, Day $day){
        if(!$day){
            return back()->withError("Le jour n'existe pas");
        }
        return view('day.show',compact('day'));    
    }

    /**
     * @param Request $request
     * @param Day $day
     */
    public function edit(Request $request, Day $day){
        //
    }

    /**
     * @param Request $request
     * @param Day $day
     */
    public function update(Request $request, Day $day){
        //
    }

    /**
     * @param Request $request
     * @param Day $day
     */
    public function destroy(Request $request, Day $day){
        if(!$day){
            return back()->withError("Le jour n'existe pas");
        }
        $day->delete();
        return redirect()->action('DayController@index')->withSuccess("Le jour été supprimé avec succès");
    }
}
