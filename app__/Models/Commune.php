<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;

    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }

}
