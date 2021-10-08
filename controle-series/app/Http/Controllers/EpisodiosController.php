<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\resources\views\episodios\index;

use App\Http\Controllers\TemporadasController;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {

        $episodio = $temporada->episodios;

        return view('episodios.index', compact('episodios'));

    }
}
