<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
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

Route::get('/series', [SeriesController::class, 'Index'])->name('listar_series') ;
 
Route::get('/series/criar', [SeriesController::class, 'create'])->name('form_criar_serie') ;
 
Route::post('/series/criar', [SeriesController::class, 'store']) ;

Route::delete('/series/{id}', [SeriesController::class, 'destroy']) ;

Route::get('/series/{serieId}/temporadas', 'TemporadasControlller@index');
