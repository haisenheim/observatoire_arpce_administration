<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Slide;
use App\Models\Tag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ArticleController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();
        $categories = Category::all();
        return view('/Admin/Articles/index')->with(compact('articles','categories'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $data['body'] = $request->body;
        $data['category_id'] = $request->category_id;
        $data['user_id'] = auth()->user()->id;
        $image = request()->image_uri;
        $data['token'] = sha1(time());

        if($image){
            $path = $this->entityImgCreate($image,'articles',time());
            $data['image_uri'] = $path;
        }
       /*  $fichier = $request->fichier_uri;
        if($fichier){
            $data['fichier_uri'] = $this->entityDocumentCreate($fichier,'articles',time());
        } */
        $slide = Article::create($data);
        return back();
    }

    public function save(Request $request)
    {
        $data['name'] = $request->name;
        $data['body'] = $request->body;
        if($request->category_id){
            $data['category_id'] = $request->category_id;
        }

        $data['user_id'] = auth()->user()->id;
        $image = request()->image_uri;

        if($image){
            $path = $this->entityImgCreate($image,'articles',time());
            $data['image_uri'] = $path;
        }
        $fichier = request()->fichier_uri;
        if($fichier){
            $data['fichier_uri'] = $this->entityDocumentCreate($fichier,'articles',time());
        }
        Article::updateOrCreate(['id'=>request()->id],$data);
        //$slide = Article::create($data);
        return back();
    }

    public function addTag(Request $request){
        $t = ArticleTag::where('tag_id',$request->tag_id)->where('article_id',$request->article_id)->first();
        if(!$t){
            ArticleTag::create(['tag_id'=>$request->tag_id,'article_id'=>$request->article_id]);
        }
        return back();
    }

    public function enable($id){
        $article = Article::find($id);
        $article->active = 1;
        $article->save();
        return back();
    }

    public function disable($id){
        $article = Article::find($id);
        $article->active = 0;
        $article->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{
        $tags = Tag::all();
		$article = Article::find($id);
        $categories = Category::all();
		return view('/Admin/Articles/show')->with(compact('article','tags','categories'));
	}



}
