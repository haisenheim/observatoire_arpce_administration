<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\Indicateur;
use App\Models\Tindicateur;
use Illuminate\Http\Request;

class IndicateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $indicateurs = Indicateur::all();
        $entreprises = Entreprise::all();
        $types = Tindicateur::all();
        return view('/Admin/Indicateurs/index')->with(compact('indicateurs','types','entreprises'));
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
        $data = $request->all();
        $indicateur = Indicateur::where('annee',$request->annee)
                        ->where('type_id',$request->type_id)->first();
        if($indicateur){
            $indicateur->valeur = $request->valeur;
            $indicateur->save();
        }else{
            Indicateur::create($data);
        }
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

	}




}
