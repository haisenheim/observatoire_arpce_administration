<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $guarded = ['id'];

    public function getPhotoAttribute(){
        $host = request()->getSchemeAndHttpHost();
        $path = $host.'/img/'.$this->image_uri;
        return $path;
    }

    public function getFichierAttribute(){
        $host = request()->getSchemeAndHttpHost();
        $path = $host.'/files/'.$this->fichier_uri;
        return $path;
    }

    public function getStatusAttribute(){
        $data['color'] = 'danger';
        $data['name'] = 'offline';
        if($this->active){
            $data['color'] = 'success';
        $data['name'] = 'online';
        }
        return $data;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }



}
