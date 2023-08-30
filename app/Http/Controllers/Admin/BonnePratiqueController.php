<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Pratique;
use App\Models\Region;
use App\User;
use Illuminate\Http\Request;

class BonnePratiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pratiques = Pratique::all();
        return view('/Admin/Pratiques/index')->with(compact('pratiques'));
    }


    public function enable($id){
        $pratique = Pratique::find($id);
        $pratique->active = 1;
        $pratique->save();
        return back();
    }

    public function disable($id){
        $pratique = Pratique::find($id);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rapport = new Pratique();
        $fichier = $request->fichier_uri;
        $rapport->name = $request->name;
        $rapport->fichier_uri = $this->entityDocumentCreate($fichier,'pratiques',time());
        $rapport->user_id = auth()->user()->id;
        $rapport->save();
        return back();
    }




}
