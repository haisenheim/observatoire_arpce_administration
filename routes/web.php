<?php

use App\Http\Controllers\OperateurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return redirect('login');
});




Auth::routes();
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth','admin'])
    ->name('admin.')
    ->group(function(){
        Route::get('/dashboard','DashboardController@index');
        Route::resource('entreprises', 'EntrepriseController');
        Route::resource('articles', 'ArticleController');
        Route::post('article/tag', 'ArticleController@addTag');
        Route::post('article/update', 'ArticleController@save');
        Route::get('fiches/{token}', 'DashboardController@showFiche');
        Route::get('article/enable/{id}', 'ArticleController@enable');
        Route::get('article/disable/{id}', 'ArticleController@disable');
        Route::get('fiche/export/{token}', 'DashboardController@exportFiche');
        Route::get('fiche/save', 'DashboardController@saveFiche');

        Route::resource('faqs', 'FaqController');
        Route::get('faq/enable/{id}', 'FaqController@enable');
        Route::get('faq/disable/{id}', 'FaqController@disable');

        Route::resource('textes', 'TexteController');
        Route::get('texte/enable/{id}','TexteController@enable');
        Route::get('texte/disable/{id}','TexteController@disable');

        Route::get('rapport/enable/{id}','RapportController@enable');
        Route::get('rapport/disable/{id}','RapportController@disable');

        Route::resource('bonnes-pratiques', 'BonnePratiqueController');
        Route::get('pratique/enable/{id}','BonnePratiqueController@enable');
        Route::get('pratique/disable/{id}','BonnePratiqueController@disable');

        Route::get('communes', 'CommuneController@index');
        Route::post('communes', 'CommuneController@store');
        Route::get('indicateurs', 'IndicateurController@index');
        Route::post('indicateurs', 'IndicateurController@store');
        Route::get('params', 'ParamController@index');
        Route::post('params', 'ParamController@store');
        Route::get('rapports', 'RapportController@index');
        Route::get('categories', 'CategoryController@index');
        Route::post('categories', 'CategoryController@store');
        Route::get('tags', 'TagController@index');
        Route::post('tags', 'TagController@store');
        Route::resource('slides', 'SlideController');
        Route::resource('blog', 'BlogController');
        Route::resource('about', 'AboutController');
        Route::resource('users', 'UserController');
        Route::get('user/enable/{token}', 'UserController@enable');
        Route::get('user/disable/{token}', 'UserController@disable');

    });
//Route::get('/', [OperateurController::class,'index']);
Route::prefix('account')
    ->namespace('App\Http\Controllers\Account')
    ->middleware(['auth'])
    ->name('account.')
    ->group(function(){
        Route::resource('rapports', 'RapportController');
        Route::resource('fiches', 'FicheController');
        Route::post('/fiche/datacenter','FicheController@addDatacenter');
        Route::resource('datacenters', 'DatacenterController');
        Route::get('/profil','ProfilController@index');
        Route::post('/profil','ProfilController@store');
        Route::resource('articles', 'ArticleController');

    });




Route::get('/print/{id}',[OperateurController::class,'print']);


