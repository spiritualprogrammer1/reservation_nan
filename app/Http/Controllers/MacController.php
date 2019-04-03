<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mac;
use Validator;

class MacController extends Controller
{
    public function index(){
        $macs = Mac::orderBy('numMac', 'asc')->get();
        return view('mac.index', compact('macs'));
    }

    public function create(){
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $validator =  Validator::make($request->all(), [
            'numMac' => 'required|integer|unique:macs,numMac',
            'isActive'  =>  'nullable|boolean'
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        Mac::create([
            'numMac'    =>  request('numMac'),
            'isActive'  =>  request('isActive') ? request('isActive') : 0
        ]);
        
        return redirect()->action('MacController@index')->withSuccess("Le mac a été ajouté avec succès");
    }

    /**
     * @param Request $request
     * @param Mac $mac
     */
    public function show(Request $request, Mac $mac){
        if(!$mac){
            return back()->withError("Le mac recherché n'existe pas");
        }
        return view('mac.show', compact('mac'));
    }

    /**
     * @param Request $request
     * @param Mac $mac
     */
    public function edit(Request $request, Mac $mac){
        if(!$mac){
            return back()->whithError("Le mac recherché n'existe pas");
        }
        return view('mac.edit', compact('mac'));
    }

    /**
     * @param Request $request
     * @param Mac $mac
     */
    public function update(Request $request, Mac $mac){
        if(!$mac){
            return back()->whithError("Le mac recherché n'existe pas");
        }

        $validator =  Validator::make($request->all(), [
            'numMac' => 'required|integer',
            'isActive'  =>  'nullable|boolean'
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $mac->update([
            'numMac'    =>  request('numMac'),
            'isActive'  =>  request('isActive') ? request('isActive') : 0
        ]);

        return redirect()->action('MacController@index')->withSuccess("Les informations du mac on été modifié avec succès");
    }

    /**
     * @param Request $request
     * @param Mac $mac
     */
    public function destroy(Request $request,mac $mac){        
        if(!$mac){
            return back()->whithError("Le mac recherché n'existe pas");
        }

        $mac->delete();
        
        return redirect()->action('MacController@index')->withSuccess("Mac supprimé avec succès");
    }
}
