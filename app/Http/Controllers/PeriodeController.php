<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periode;
use Validator;

class PeriodeController extends Controller
{
    public function index(){
        $periodes = Periode::all();
        return view('periode.index',compact('periodes'));
    }

    public function create(){
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'heureDebut' => 'required|date_format:H:i',
            'heureFin' => 'required|date_format:H:i|after:heureDebut',
            'isActive'  =>  'nullable|boolean'
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        Periode::create([
            'heureDebut' => request('heureDebut'),
            'heureFin' => request('heureFin'),
            'isActive'  =>  request('isActive') ? request('isActive') : 0
        ]);
        
        return redirect()->action('PeriodeController@index')->withSuccess("La période a été ajouté avec succès");        
    }

    /**
     * @param Request $request
     * @param Periode $periode
     */
    public function show(Request $request, Periode $periode){
        if(!$periode){
            return back()->withError("La periode n'existe pas");
        }
        return view('periode.show', compact('periode'));
    }

    /**
     * @param Request $request
     * @param Periode $periode
     */
    public function edit(Request $request, Periode $periode){
        if(!$periode){
            return back()->withError("La periode n'existe pas");
        }
        return view('periode.edit', compact('periode'));
    }

    /**
     * @param Request $request
     * @param Periode $periode
     */
    public function update(Request $request, Periode $periode){
        if(!$periode){
            return back()->withError("La periode n'existe pas");
        }
		
		$validator = Validator::make($request->all(), [
            'heureDebut' => 'required',
            'heureFin' => 'required|after:heureDebut',
            'isActive'  =>  'nullable|boolean'
        ]);
		
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
		$periode->update([
            'heureDebut' => request('heureDebut'),
            'heureFin' => request('heureFin'),
            'isActive'  =>  request('isActive') ? request('isActive') : 0
        ]);
        
        return redirect()->action('PeriodeController@index')->withSuccess("La période a été modifié avec succès");        
    }

    /**
     * @param Request $request
     * @param Periode $periode
     */
    public function destroy(Request $request, Periode $periode){
        if(!$periode){
            return back()->withError("La periode n'existe pas");
        }
        $periode->delete();
        return redirect()->action('PeriodeController@index')->withSuccess("La période a été supprimé avec succès");        
    }
}
