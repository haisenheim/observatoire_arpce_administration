<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pratique extends Model
{
    //
    protected $guarded = [];


    public function getFichierAttribute(){
        $host = request()->getSchemeAndHttpHost();
        $path = $host.'/files/'.$this->fichier_uri;
        return $path;
    }

}
