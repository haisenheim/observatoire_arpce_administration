<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Agent;
use App\Models\Rapport;
use App\Models\Region;
use Illuminate\Http\Request;

class RapportController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rapports = Rapport::all();
        return view('/Admin/Rapports/index')->with(compact('rapports'));
    }


    public function enable($id){
        $pratique = Rapport::find($id);
        $pratique->active = 1;
        $pratique->save();
        return back();
    }

    public function disable($id){
        $pratique = Rapport::find($id);
        $pratique->active = 0;
        $pratique->save();
        return back();
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






}
