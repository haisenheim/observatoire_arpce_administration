<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    //
    protected $guarded = ['id'];

    public function getPhotoAttribute(){
        $host = request()->getSchemeAndHttpHost();
        $path = $host.'/img/'.$this->image_uri;
        return $path;
    }



}
