<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\ExtendedController;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$entreprise = Entreprise::find(auth()->user()->entreprise_id);
        $profil = User::find(auth()->user()->id);
       // return view('/Account/profil')->with(compact('profil'));
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
       // dd($request->all());
       // $data = $request->except('fichier_uri');
       $user = User::find(auth()->user()->id);
        $user->name = $request['user']['name'];
        $user->phone = $request['user']['phone'];
        $user->email = $request['user']['email'];
        if($request['user']['password']){
            $user->password = bcrypt($request['user']['password']);
        }
        $user->save();
      // $user = User::updateOrCreate(['id'=>auth()->user()->id],$data);
        $ent['name'] = $request['entreprise']['name'];
        $ent['phone'] = $request['entreprise']['phone'];
        $ent['email'] = $request['entreprise']['email'];
       $entreprise = Entreprise::updateOrCreate(['id'=>auth()->user()->entreprise_id],$ent);
        return response()->json(['user'=>$user,'entreprise'=>$entreprise]);
    }




}
