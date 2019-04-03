<?php

namespace App\Http\Controllers;

use App\Rsetudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\TypeUser;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $types = TypeUser::all()->pluck('libelle','id');
        return view('user.index',compact('users','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!TypeUser::where('id',request('type_user_id'))->first()){
            return back()->withError("Le type utilisateur n'existe pas");
        }

        $validator = Validator::make($request->all(), [
            'name'  =>  'required|string',
            'email' =>  'required|email|unique:users,email',
            'type_user_id'  =>  'required|integer',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

        User::create([
            'name'  =>  request('name'),
            'email' =>  request('email'),
            'type_user_id'  =>  request('type_user_id'),
            'password'  =>  bcrypt(request('password'))
        ]);

        return redirect()->action('UserController@index')->withSuccess("Utilisateur crée avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if(!$user){
            return back()->withError("L'utilisateur n'existe pas");
        }
        $types = TypeUser::all()->pluck('libelle','id');
        return view('user.show',compact('user','types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!$user){
            return back()->withError("L'utilisateur n'existe pas");
        }
        $types = TypeUser::all()->pluck('libelle','id');
        return view('user.edit',compact('user','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User  $user)
    {
        if(!$user){
            return back()->withError("L'utilisateur n'existe pas");
        }

        if(!TypeUser::where('id',request('type_user_id'))->first()){
            return back()->withError("Le type utilisateur n'existe pas");
        }


        $validator = Validator::make($request->all(), [
            'name'  =>  'required|string',
            'email' =>  'requied|email|unique:users,email',
            'type_user_id'  =>  'required|integer',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->update([
            'name'  =>  request('name'),
            'email' =>  request('email'),
            'type_user_id'  =>  request('type_user_id'),
            'password'  =>  bcrypt(request('password'))
        ]);
        return redirect()->action('UserController@index')->withSuccess("Utilisateur modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!$user){
            return back()->withError("L'utilisateur n'existe pas");
        }
        $user->delete();
        return redirect()->action('UserController@index')->withSuccess("Utilisateur supprimé avec succès");
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function updatepassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:3',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

        $id = Auth::user()->id;

        $user = User::findOrFail($id);
        $user->password = bcrypt($request['password']);
        $user->save();


        return redirect()->action('UserController@profile')->withSuccess("Votre mot de passe a été modifié");

    }



    public function passwordresetnan()
    {
        return view('passwordreset');
    }

    public function passwordreset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' =>  'required|email',
            'password' => 'required|string',
        ]);



        if(!User::where('email',request('email'))->first()){
            return redirect()->action('UserController@passwordresetnan')->withSuccess("le mail n existe pas désolé");
        }
        else{
            if($validator->fails()){
                return back()->withErrors($validator->errors())->withInput();
            }
            $user = User::where('email',request('email'))->first();



            $user->password = bcrypt(request('password')) ;
            $user->save();
            //  dd($user);

            return redirect()->action('UserController@passwordresetnan')->withSuccess("Password modifié avec succès");
        }

    }

    public function newuser()
    {
        $users = User::all();
        $types = TypeUser::all()->pluck('libelle','id');
        return view('user.index',compact('users','types'));
    }

    public function newusers(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'  =>  'required|string',
            'email' =>  'required|email|unique:users,email',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }
        $password= "secret";

        User::create([
            'name'  =>  request('name'),
            'email' =>  request('email'),
            'password'  =>  bcrypt($password)
        ]);

        return redirect()->action('UserController@newuser')->withSuccess("Utilisateur crée avec succès");
    }

    public function updateusers(Request $request,$id)
    {


        $user = User::findOrFail($id);


        $validator = Validator::make($request->all(), [
            'name'  =>  'required|string',
            'email' =>  'requied|email|unique:users,email',
            'type_user_id'  =>  'required|integer',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->update([
            'name'  =>  request('name'),
            'email' =>  request('email'),
//            'type_user_id'  =>  request('type_user_id'),
//            'password'  =>  bcrypt(request('password'))
        ]);
        return redirect()->action('UserController@newuser')->withSuccess("Utilisateur modifié avec succès");

    }

    public function savenewuser()
    {
        $usernes = Rsetudiant::all();
        $password = "secret";

        foreach ($usernes as $userne)
        {
            // dd($userne->name);
            User::create([
                'name'  =>  $userne->name,
                'email' =>  $userne->email,
                'password'  =>  bcrypt($password),
                'isadmin' => 0
            ]);


        }

        return "ok";

    }

}
