<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ExtendedController;
use App\Models\Category;
use App\Models\Pratique;
use App\Models\Region;
use App\Models\Texte;
use App\User;
use Illuminate\Http\Request;

class TexteController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $textes = Texte::all();
        return view('/Admin/Textes/index')->with(compact('textes'));
    }


    public function enable($id){
        $pratique = Texte::find($id);
        $pratique->active = 1;
        $pratique->save();
        return back();
    }

    public function disable($id){
        $pratique = Texte::find($id);
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
        $rapport = new Texte();
        $fichier = $request->fichier_uri;
        $rapport->name = $request->name;
        $rapport->fichier_uri = $this->entityDocumentCreate($fichier,'textes',time());
        $rapport->user_id = auth()->user()->id;
        $rapport->save();
        return back();
    }




}
