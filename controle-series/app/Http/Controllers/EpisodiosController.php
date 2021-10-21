<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Temporada;

use App\Models\episodio;


class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {

       return view('episodios.index', [
           'episodios' => $temporada->episodios,
        'temporadaId' => $temporada->id
        ]);
    }
    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio)
        use ($episodiosAssistidos)
        {
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
        });

        $temporada->push();

        //   return redirect()->back(); para redirecionar para tela anterior
        


        return redirect('/temporadas/' . $temporada->id . '/episodios');

    }
}