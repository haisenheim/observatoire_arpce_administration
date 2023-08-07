<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Datacenter extends Model
{
    //
    protected $guarded = [];
    protected $dates = ['start'];

    public function entreprise()
    {
        return $this->belongsTo('App\Models\Entreprise');
    }

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune');
    }

}
