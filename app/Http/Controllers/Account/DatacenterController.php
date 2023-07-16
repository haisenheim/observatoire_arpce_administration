<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\ExtendedController;
use App\Models\Commune;
use App\Models\Datacenter;
use Illuminate\Http\Request;

class DatacenterController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $centres = Datacenter::where('entreprise_id',auth()->user()->entreprise_id)->get();
        $communes = Commune::all();
        return view('/Account/Datacenters/index')->with(compact('centres','communes'));
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

        $data = $request->except('_token');
        $data['entreprise_id'] = auth()->user()->entreprise_id;
        $data['token'] = sha1(time());
        Datacenter::updateOrCreate($data);
        return back();
    }




}
