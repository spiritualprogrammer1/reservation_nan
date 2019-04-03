<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeUser;
use Validator;
class TypeUserController extends Controller
{
    public function index(){
        $typeUsers = TypeUser::all();
        return view('type_user.index', compact('typeUsers'));
    }

    public function create(){
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'libelle'   =>  'required|string',
            'nbreHeure' =>  'nullable|integer',
            'autoriseAComposer' =>  'nullable|boolean',
            'groupe'    =>  'nullable|string',
            'equipe'    =>  'nullable|string'
        ]);
        
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

        TypeUser::create([
            'libelle'   =>  request('libelle'),
            'nbreHeure' =>  request('nbreHeure') ? request('nbreHeure') : 0,
            'autoriseAComposer' =>  request('autoriseAComposer') ? request('autoriseAComposer') : 0,
            'groupe'    =>  request('groupe'),
            'equipe'    =>  request('equipe')
        ]);

        return redirect()->action('TypeUserController@index')->withSuccess("Le type utilisateur a été ajouté avec succès");
    }

    /**
     * @param Request $request
     * @param TypeUser $typeUser
     */
    public function show(Request $request, TypeUser $typeUser){
        if(!$typeUser){
            return back()->withError("Le type utilisateur n'existe pas");
        }
        return view('type_user.show', compact('typeUser'));
    }

    /**
     * @param Request $request
     * @param TypeUser $typeUser
     */
    public function edit(Request $request, TypeUser $typeUser){
        if(!$typeUser){
            return back()->withError("Le type utilisateur n'existe pas");
        }
        return view('type_user.edit', compact('typeUser'));
    }

    /**
     * @param Request $request
     * @param TypeUser $typeUser
     */
    public function update(Request $request, TypeUser $typeUser){
        if(!$typeUser){
            return back()->withError("Le type utilisateur n'existe pas");
        }
        
        $validator = Validator::make($request->all(), [
            'libelle'   =>  'required|string',
            'nbreHeure' =>  'nullable|integer',
            'autoriseAComposer' =>  'nullable|boolean',
            'groupe'    =>  'nullable|string',
            'equipe'    =>  'nullable|string'
        ]);
        
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

        $typeUser->update([
            'libelle'   =>  request('libelle'),
            'nbreHeure' =>  request('nbreHeure') ? request('nbreHeure') : 0,
            'autoriseAComposer' =>  request('autoriseAComposer') ? request('autoriseAComposer') : 0,
            'groupe'    =>  request('groupe'),
            'equipe'    =>  request('equipe')
        ]);
        
        return redirect()->action('TypeUserController@index')->withSuccess("Le type utilisateur a été modifié avec succès");
    }

    /**
     * @param Request $request
     * @param TypeUser $typeUser
     */
    public function destroy(Request $request, TypeUser $typeUser){
        if(!$typeUser){
            return back()->withError("Le type utilisateur n'existe pas");
        }
        $typeUser->delete();
        
        return redirect()->action('TypeUserController@index')->withSuccess("Type utilisateur supprimé avec succès");
    }
}
