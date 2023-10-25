<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Entreprise;
use App\Models\Secteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntrepriseController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entreprises = Entreprise::all();
        $secteurs = Secteur::all();
        return view('/Admin/Entreprises/index')->with(compact('entreprises','secteurs'));
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
        //$data = $request->except('image_uri');
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
        ]);
        //dd($validator->validated());
        if($validator->fails()){
            //dd($validator);
            request()->session()->flash('danger',' Impossible d\'enregistrer cette entreprise, Veuillez changer l\'email du compte admin !!!');
            return back();
        }

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->ent_email;
        $data['secteur_id'] = $request->secteur_id;
        $token = sha1(time());
       // $data['token'] = $token;
        $image = request()->image_uri;
        if($image){
            $path = $this->entityImgCreate($image,'entreprise',time());
            $data['image_uri'] = $path;
        }
        $entreprise = Entreprise::create($data);
        $user = new User();
        $user->name = $request->user_name;
        $user->phone = $request->user_phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->entreprise_id = $entreprise->id;
        $user->role_id = 2;
        $user->token = $token;
        $user->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{

        $entreprise = Entreprise::find($id);

		return view('/Admin/Entreprises/show')->with(compact('entreprise'));
	}


}
