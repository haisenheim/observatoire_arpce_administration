<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //
    protected $guarded = ['id'];
    public $timestamps = false;

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

   



}
