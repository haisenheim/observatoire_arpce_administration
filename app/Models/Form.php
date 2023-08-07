<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //
    protected $guarded = [];

    public function entreprise()
    {
        return $this->belongsTo('App\Models\Entreprise');
    }

    public function getEmissionAttribute(){
        return $this->energie_elec * 312 * pow(10,-6);
    }

    public function datafiches(){
        return $this->hasMany('App\Models\DatacenterFiche','fiche_id');
    }

}
