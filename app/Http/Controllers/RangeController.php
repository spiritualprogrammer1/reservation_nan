<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Range;
use Carbon\Carbon;
use App\Day;
use Validator;
class RangeController extends Controller
{

    public function index(){
        $ranges = Range::latest()->get();
        return view('range.index', compact('ranges'));
    }

    public function create(){
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
        ]);




        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if(Carbon::now()->format('Y-m-d') > Carbon::parse(request('dateDebut'))->format('Y-m-d')){
            return back()->withError("La date de debut ne peut-être avant aujourd'hui");
        }

        if(Day::where('jour',request('dateDebut'))->first() || Day::where('jour',request('dateFin'))->first()){
            return back()->withError("Veuillez changer la date de debut ou de fin car elle est déjà enregistrée");            
        }


       // dd($validator->fails());


       $requestdebut =  date('Y-m-d', strtotime(request('dateDebut')));

        $requestdatefin =  date('Y-m-d', strtotime(request('dateFin')));


        Range::create([
            'dateDebut' => $requestdebut,
            'dateFin' => $requestdatefin
        ]);
        
        return redirect()->action('RangeController@index')->withSuccess("Le range a été ajouté avec succès");        
    }

    /**
     * @param Request $request
     * @param Range $range
     */
    public function show(Request $request, Range $range){
        if(!$range){
            return back()->withError("Le range n'existe pas");
        }
        return view('range.show',compact('range'));
    }

    /**
     * @param Request $request
     * @param Range $range
     */
    public function edit(Request $request, Range $range){
        if(!$range){
            return back()->withError("Le range n'existe pas");
        }
        return view('range.edit',compact('range'));
    }

    /**
     * @param Request $request
     * @param Range $range
     */
    public function update(Request $request, Range $range){
        if(!$range){
            return back()->withError("Le range n'existe pas");
        }
    
        $validator = Validator::make($request->all(), [
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if(Carbon::now()->format('Y-m-d') > Carbon::parse(request('dateDebut'))->format('Y-m-d')){
            return back()->withError("La date de debut ne peut-être avant aujourd'hui");
        }

        if(Day::where('jour',request('dateDebut'))->first() || Day::where('jour',request('dateFin'))->first()){
            return back()->withError("Veuillez changer la date de debut ou de fin car elle est déjà enregistrée");            
        }

        $range->update([
            'dateDebut' => request('dateDebut'),
            'dateFin' => request('dateFin')
        ]);
        
        return redirect()->action('RangeController@index')->withSuccess("Le range a été modifié avec succès");        
    }

    /**
     * @param Request $request
     * @param Range $range
     */
    public function destroy(Request $request, Range $range){
        if(!$range){
            return back()->withError("Le range n'existe pas");
        }
        $range->delete();

        return redirect()->action('RangeController@index')->withSuccess("Le range a été supprimé avec succès");        
    }
}
