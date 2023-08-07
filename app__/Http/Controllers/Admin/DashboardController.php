<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fiche;
use App\Models\Secteur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

	public function __invoke()
	{
		return view('Admin/dashboard');
	}

    public function index()
	{
        $fiches = Fiche::orderBy('annee','DESC')->get();
		return view('Admin/dashboard')->with(compact('fiches'));
	}

    public function showFiche($token){
        $fiche = Fiche::where('token',$token)->first();
        if($fiche->type_id == 1){
            return view('/Admin/Fiches/show_1')->with(compact('fiche'));
        }
        if($fiche->type_id == 2){
            return view('/Admin/Fiches/show_2')->with(compact('fiche'));
        }
        if($fiche->type_id == 3){

            return view('/Admin/Fiches/show_3')->with(compact('fiche'));
        }

        return view('/Admin/Fiches/show')->with(compact('fiche'));

    }
}
