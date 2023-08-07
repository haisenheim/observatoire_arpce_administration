<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    //
    protected $guarded = [];

    public function entreprise()
    {
        return $this->belongsTo('App\Models\Entreprise');
    }

    public function datafiches(){
        return $this->hasMany('App\Models\DatacenterFiche','fiche_id');
    }


}
