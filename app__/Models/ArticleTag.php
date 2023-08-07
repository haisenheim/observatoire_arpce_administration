<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'article_tag';

    public function article(){
        return $this->belongsTo('App\Models\Article');
    }
    public function tag(){
        return $this->belongsTo('App\Models\Tag');
    }
}
