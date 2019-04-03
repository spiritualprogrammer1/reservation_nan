<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeriodeJour;

class PeriodeJourController extends Controller
{
    public function index(){
        $periodeJours = PeriodeJour::orderBy('day_id', 'desc')
                                    ->get();
        return view('periode_jour.index', compact('periodeJours')); 
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
     * @param PeriodeJour $periodeJour
     */
    public function show(Request $request, PeriodeJour $periodeJour){
        if(!$periodeJour){
            return back()->withError("La periode jour n'existe pas");
        }
        return view('periode_jour.show',compact('periodeJour'));
    }

    /**
     * @param Request $request
     * @param PeriodeJour $periodeJour
     */
    public function edit(Request $request, PeriodeJour $periodeJour){
        if(!$periodeJour){
            return back()->withError("La periode jour n'existe pas");
        }
        return view('periode_jour.edit',compact('periodeJour'));
    }

    /**
     * @param Request $request
     * @param PeriodeJour $periodeJour
     */
    public function update(Request $request, PeriodeJour $periodeJour){
        //
    }

    /**
     * @param Request $request
     * @param PeriodeJour $periodeJour
     */
    public function destroy(Request $request, PeriodeJour $periodeJour){
        if(!$periodeJour){
            return back()->withError("La periode jour n'existe pas");
        }
        $periodeJour->delete();
        
        return redirect()->action('PeriodeJourController@index')->withSuccess("Periode jour supprimé avec succès");        
    }
}
