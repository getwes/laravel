<?php

namespace App\Services;

class CriadorDeSerie 
{

    public function criarSerie(string $nomeserie, int $qtdTemporadas, int $epporTemporada)
    {   
                //dd($request);
        $serie = Serie::create(['nome' => $nomeserie]);
        $qtdTemporadas = $request->qtd_temporadas;
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $epporTemporada; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        return $serie;

    }
}