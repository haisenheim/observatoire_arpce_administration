<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    //
    protected $guarded = ['id'];

    public function indicateurs()
    {
        return $this->hasMany('App\Models\Indicateur');
    }

    public function rapports()
    {
        return $this->hasMany('App\Models\Rapport');
    }

    public function user(){
        return $this->hasOne('App\Models\User','entreprise_id');
    }

    public function secteur()
    {
        return $this->belongsTo('App\Models\Secteur');
    }

    public function getPhotoAttribute(){
        $host = request()->getSchemeAndHttpHost();
        $path = $host.'/img/'.$this->image_uri;
        return $path;
    }





}
