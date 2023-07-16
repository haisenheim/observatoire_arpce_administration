<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\ExtendedController;
use App\Http\Resources\DatacenterResource;
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
        return response()->json(['centers'=>DatacenterResource::collection($centres),'communes'=>$communes]);
        //return view('/Account/Datacenters/index')->with(compact('centres','communes'));
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
        $data['entreprise_id'] = auth()->user()->entreprise_id;
        $data['token'] = sha1(auth()->user()->id.time());
        Datacenter::updateOrCreate($data);
        return response()->json('Ok');
    }




}
