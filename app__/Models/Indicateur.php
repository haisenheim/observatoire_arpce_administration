<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Indicateur extends Model
{
    //
    protected $guarded = [];
   // protected $dates = ['dtn','cni_expiration'];

    public function entreprise()
    {
        return $this->belongsTo('App\Models\Entreprise');
    }



    public function type()
    {
        return $this->belongsTo('App\Models\Tindicateur','type_id');
    }

    public function village()
    {
        return $this->belongsTo('App\Models\Village','village_id');
    }

    public function formation()
    {
        return $this->belongsTo('App\Models\Formation');
    }

    public function niveau()
    {
        return $this->belongsTo('App\Models\Niveau');
    }

    public function situation()
    {
        return $this->belongsTo('App\Models\Situation');
    }



    public function activite()
    {
        return $this->belongsTo('App\Models\Activite');
    }

    public function parcelles(){
        return $this->hasMany('App\Models\Exploitation','exploitant_id');
    }

    public  function getNameAttribute(){
        return $this->last_name . "  ".$this->first_name;
    }

    public function getImageAttribute(){
        $tabs = explode('/',$this->photo_uri);
        $name = last($tabs);
        $host = request()->getSchemeAndHttpHost();
           $path = $host.'/img/producteurs/'.$name;
        return $path;
    }


}
