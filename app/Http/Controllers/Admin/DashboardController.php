<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fiche;
use App\Models\Secteur;
use Illuminate\Http\Request;
use App\Exports\FicheExport;
use App\Models\Form;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{

	public function __invoke()
	{
		return view('Admin/dashboard');
	}

    public function index()
	{
        $fiches = Form::orderBy('annee','DESC')->get();
		return view('Admin/dashboard')->with(compact('fiches'));
	}

    public function exportFiche($token)
    {
        $fiche = Form::where('token',$token)->first();


        return Excel::download(new FicheExport($fiche), $fiche->entreprise->name.'-'.$fiche->annee.'.xlsx');

    }

    public function saveFiche(){
        $field = request()->field;
        $value = request()->value;
        $id = request()->id;
        Form::updateOrCreate([
            'id'=>$id
        ],[
            $field => $value
        ]);

        return response()->json('Ok');
    }

    public function showFiche($token){
        $fiche = Form::where('token',$token)->first();
        if($fiche->type_id == 1){
            return view('/Admin/Fiches/show')->with(compact('fiche'));
        }
        if($fiche->type_id == 2){
            return view('/Admin/Fiches/show_2')->with(compact('fiche'));
        }
        if($fiche->type_id == 3){

            return view('/Admin/Fiches/show')->with(compact('fiche'));
        }

        return view('/Admin/Fiches/show')->with(compact('fiche'));

    }
}
