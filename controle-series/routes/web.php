<?php

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
//route é a rota get é o localhost "http"
//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/series', function() {
    $series = [
        'the 100',
        'orange is the new black',
        'grey\'s anatomy' ,
        'lucifer',
        'elite',
        'la casa de papel',
        'vis a vis',
        'teen wolf',
        'shadowhunters'

    ];

    $html = "<ul>";
foreach ($series as $serie){
    $html .="<li>$serie</li>";
}
$html .= "</ul>";

echo $html;
});
