<?php

namespace App\Http\Controllers;

use App\Models\serie;

use Illuminate\Http\Request;

use App\resources\views\episodios\index;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas;

        return view('temporadas.index', compact('serie' , 'temporadas'));
    }
}