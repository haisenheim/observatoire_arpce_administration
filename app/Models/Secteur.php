<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    //
    protected $guarded = [];

    public function entreprises()
    {
        return $this->hasMany('App\Models\Entreprise','secteur_id');
    }


}
