<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Tag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FaqController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faqs = Faq::all();
        $categories = Category::all();
        return view('/Admin/Faqs/index')->with(compact('faqs','categories'));
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
        $data['question'] = $request->question;
        $data['reponse'] = $request->reponse;
        $data['category_id'] = $request->category_id;

       
        $slide = Faq::create($data);
        return back();
    }

  

    public function enable($id){
        $article = Faq::find($id);
        $article->active = 1;
        $article->save();
        return back();
    }

    public function disable($id){
        $article = Faq::find($id);
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
