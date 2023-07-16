<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tindicateur extends Model
{
    //
    protected $guarded = [];

    public function indicateurs()
    {
        return $this->hasMany('App\Models\Indicateur','type_id');
    }


}
