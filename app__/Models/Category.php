<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
   // protected $appends =['count'];

    public function articles(){
        return $this->hasMany('App\Models\Article');
    }

    public function getCountAttribute(){

        return $this->articles->count();
    }
}
