<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\ExtendedController;
use App\Models\Datacenter;
use App\Models\DatacenterFiche;
use App\Models\Fiche;
use App\Models\User;
use Illuminate\Http\Request;

class FicheController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fiches = Fiche::where('entreprise_id',auth()->user()->entreprise_id)->get();
        return response()->json($fiches);
    }

    public function find($token){
        $fiche = Fiche::where('token',$token)->first();
        $datacenters = Datacenter::where('entreprise_id',auth()->user()->entreprise_id)->get();
        return response()->json(['fiche'=>$fiche,'datacenters'=>$datacenters]);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::find(auth()->user()->id);
        $ent = $user->entreprise;
        if($ent->secteur_id == 1){
            return view('/Account/Fiches/create_1');
        }
        if($ent->secteur_id == 2){
            return view('/Account/Fiches/create_2');
        }
        if($ent->secteur_id == 3){
            $datacenters = Datacenter::where('entreprise_id',auth()->user()->entreprise_id)->get();
            return view('/Account/Fiches/create_3')->with(compact('datacenters'));
        }
        return view('/Account/Fiches/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = User::find(auth()->user()->id);
       $data = $request->except('secteur_id');
        $data['entreprise_id'] = $user->entreprise_id;
        $data['type_id'] = $request->secteur_id;
        $data['token'] = sha1($user->id.time());
        $fiche = Fiche::updateOrCreate($data);
        return response()->json($fiche);
        //return redirect('/account/fiches/'.$fiche->token);
    }

    public function addDatacenter(Request $request){
        $fiche = Fiche::where('token',$request->token)->first();
        $data['fiche_id'] = $fiche->id;
        $data['datacenter_id'] = $request->datacenter_id;
        $data['vol_eau_sortant'] = $request->vol_eau_sortant;
        $data['vol_eau_entrant'] = $request->vol_eau_entrant;
        $data['conso_elec_equip'] = $request->conso_elec_equip;
        $data['conso_elec_dc'] = $request->conso_elec_dc;
        $dc = DatacenterFiche::create($data);
        return $dc;
    }

    public function removeDatacenter(Request $request){
        $df = DatacenterFiche::find($request->_id);
        if($df->fiche->entreprise_id != auth()->user()->entreprise_id){
            return response()->json(['error'=>'Erreur de suppression'],401);
        }

        $df->delete();
        return response()->json('Ok');
    }

   /* public function show($token){
        $fiche = Fiche::where('token',$token)->first();
        if($fiche->type_id == 1){
            return view('/Account/Fiches/show_1')->with(compact('fiche'));
        }
        if($fiche->type_id == 2){
            return view('/Account/Fiches/show_2')->with(compact('fiche'));
        }
        if($fiche->type_id == 3){
            $datacenters = Datacenter::where('entreprise_id',auth()->user()->entreprise_id)->get();
            return view('/Account/Fiches/show_3')->with(compact('fiche','datacenters'));
        }

        return view('/Account/Fiches/show')->with(compact('fiche'));

    } */




}
