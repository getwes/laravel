<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
 use App\Serie;
use Illuminate\Http\Request;

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
//route é a rota get é o localhost "http"
Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', [SeriesController::class, 'Index'])->name('listar_series');
 
Route::get('/series/criar', [SeriesController::class, 'create'])->name('form_criar_serie') 
->middleware('autenticador');
 
Route::post('/series/criar', [SeriesController::class, 'store'])
->middleware('autenticador') ;

Route::delete('/series/{id}', [SeriesController::class, 'destroy'])
->middleware('autenticador') ;  

Route::POST('/series/{id}/editaNome', 'SeriesController@editaNome')
->middleware('autenticador');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
->middleware('autenticador');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/entrar', 'EntrarController@index');

Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');

Route::post('/registrar', 'RegistroController@store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});
