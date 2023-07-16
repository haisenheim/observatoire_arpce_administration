<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Member\DatacenterController;
use App\Http\Controllers\Api\Member\FicheController;
use App\Http\Controllers\Api\Member\ProfilController;
use App\Http\Controllers\Api\Member\RapportController;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\Entreprise;
use App\Models\Indicateur;
use App\Models\Rapport;
use App\Models\Source;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/data',function(){
    $indicateurs = Indicateur::all();
    $electricite = $indicateurs->where('type_id',1);
    $eau = $indicateurs->where('type_id',2);
    $ges = $indicateurs->where('type_id',3);
    $source = Source::find(1);
    return response()->json(['elec'=>$electricite,'eau'=>$eau,'ges'=>$ges,'source'=>$source]);
});

Route::get('/blog', function () {
    $rapports = Rapport::all();
    $categories = Category::all();
    $articles = Article::orderBy('created_at','DESC')->where('active',1)->paginate(10);
    $recents = Article::orderBy('created_at','DESC')->where('active',1)->take(1)->get();
    $tags = Tag::all();
    return response()->json(['rapports'=>$rapports,'tags'=>$tags,'categories'=>$categories,'articles'=>$articles,'recents'=>$recents]);
	//return view('Front/blog')->with(compact('rapports','tags','categories','articles'));
});

Route::get('/articles',function(){
    $rapports = Rapport::all();
    $categories = CategoryResource::collection(Category::all());
    $articles = Article::orderBy('created_at','DESC')->where('active',1)->paginate(1);
    $recents = ArticleResource::collection(Article::orderBy('created_at','DESC')->where('active',1)->take(1)->get());
    $tags = Tag::all();
    return response()->json(compact('rapports','categories','recents','tags','articles'));
});

Route::get('/article/{token}', function ($token) {
    $article = new ArticleResource(Article::where('token',$token)->first());
    $tags = Tag::all();
    $recents = ArticleResource::collection(Article::orderBy('created_at','DESC')->where('active',1)->take(2)->get());
    $categories = CategoryResource::collection(Category::all());
    return response()->json(compact('article','tags','categories','recents'));
});

Route::get('/',function(){
    return response()->json('Hello');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/signin', 'login');
    Route::post('/auth/register', 'register');
    Route::post('/auth/logout', 'logout');
    Route::post('/auth/refresh', 'refresh');

});
Route::post('/upload',function(){
    dd(request()->all());
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    $user = $request->user();
    $entreprise = Entreprise::find($user->entreprise_id);
    return ['user'=>$user,'entreprise'=>$entreprise];
});

Route::middleware('auth:api')->post('/profil', [ProfilController::class,'store']);
Route::middleware('auth:api')->get('/fiches', [FicheController::class,'index']);
Route::middleware('auth:api')->get('/datacenters', [DatacenterController::class,'index']);
Route::middleware('auth:api')->post('/datacenters', [DatacenterController::class,'store']);
Route::middleware('auth:api')->get('/rapports', [RapportController::class,'index']);
Route::middleware('auth:api')->post('/rapports', [RapportController::class,'store']);
Route::middleware('auth:api')->get('/fiche/{token}', [FicheController::class,'find']);
Route::middleware('auth:api')->post('/fiche', [FicheController::class,'store']);
Route::middleware('auth:api')->post('/fiche/df', [FicheController::class,'addDatacenter']);
Route::middleware('auth:api')->post('/fiche/rdf', [FicheController::class,'removeDatacenter']);
