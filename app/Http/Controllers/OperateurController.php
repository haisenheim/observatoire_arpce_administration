<?php

namespace App\Http\Controllers;

use App\Models\Operateur;
use Illuminate\Http\Request;
use PDF;

class OperateurController extends Controller
{
    //
    public function index(){
        $operateurs = Operateur::all();
        return view('Operateurs.index')->with(compact('operateurs'));
    }

    public function print($id){
        $operateur = Operateur::find($id);
        $pdf = PDF::loadView('Operateurs.print', compact('operateur'));
        return $pdf->stream('operateur'.$operateur->id.'.pdf');
        //return view('Operateurs.print')->with(compact('operateur'));
    }
}
