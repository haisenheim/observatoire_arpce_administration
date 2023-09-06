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
        Route::get('/dashboard','DashboardController@index')->name('dashboard');
        Route::resource('entreprises', 'EntrepriseController');
        Route::resource('articles', 'ArticleController');
        Route::post('article/tag', 'ArticleController@addTag')->name('article.add-tag');
        Route::post('article/update', 'ArticleController@save')->name('article.save');
        Route::get('fiches/{token}', 'DashboardController@showFiche')->name('fiche.show');
        Route::get('article/enable/{id}', 'ArticleController@enable')->name('article.enable');
        Route::get('article/disable/{id}', 'ArticleController@disable')->name('article.disable');
        Route::get('fiche/export/{token}', 'DashboardController@exportFiche')->name('fiche.export');
        Route::get('fiche/save', 'DashboardController@saveFiche')->name('fiche.save');

        Route::resource('faqs', 'FaqController');
        Route::get('faq/enable/{id}', 'FaqController@enable')->name('faq.enable');
        Route::get('faq/disable/{id}', 'FaqController@disable')->name('faq.disable');

        Route::resource('textes', 'TexteController');
        Route::get('texte/enable/{id}','TexteController@enable')->name('texte.enable');
        Route::get('texte/disable/{id}','TexteController@disable')->name('texte.disable');

        Route::get('rapport/enable/{id}','RapportController@enable')->name('rapport.enable');
        Route::get('rapport/disable/{id}','RapportController@disable')->name('rapport.disable');

        Route::resource('bonnes-pratiques', 'BonnePratiqueController');
        Route::get('pratique/enable/{id}','BonnePratiqueController@enable')->name('pratique.enable');
        Route::get('pratique/disable/{id}','BonnePratiqueController@disable')->name('pratique.disable');

        Route::get('communes', 'CommuneController@index')->name('communes.index');
        Route::post('communes', 'CommuneController@store')->name('communes.store');
        Route::get('indicateurs', 'IndicateurController@index')->name('indicateurs.index');
        Route::post('indicateurs', 'IndicateurController@store')->name('indicateurs.store');
        Route::get('params', 'ParamController@index')->name('param.index');
        Route::post('params', 'ParamController@store')->name('param.store');
        Route::get('rapports', 'RapportController@index')->name('rapports.index');
        Route::resource('categories', 'CategoryController');
       // Route::post('categories', 'CategoryController@store');
        Route::resource('tags', 'TagController');
        //Route::post('tags', 'TagController@store');
        Route::resource('slides', 'SlideController');
        Route::resource('blog', 'BlogController');
        Route::resource('about', 'AboutController');
        Route::resource('users', 'UserController');
        Route::get('user/enable/{token}', 'UserController@enable')->name('user.enable');
        Route::get('user/disable/{token}', 'UserController@disable')->name('user.disable');

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


