<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Param;
use Illuminate\Http\Request;

class ParamController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $param = Param::find(1);
        return view('/Admin/param')->with(compact('param'));
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
        
        $data = $request->except('about_photo',);
        $image = $request->about_photo;
        if($image){
            $path = $this->entityImgCreate($image,'param','about');
            $data['about_photo'] = $path;
        }

        Param::updateOrCreate(['id'=>1],$data);
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
		$exploitant = Exploitant::find($id);
		return view('/Admin/Exploitants/show')->with(compact('exploitant'));
	}




}
