<?php

namespace App\Http\Controllers;
use App\serie;

use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $temporadas = Serie::find($serieId)->temporadas;

        return view('temporadas.index', compact('temporadas'));
    }
}