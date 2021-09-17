<?php

namespace App\Services;

 class CriadorDeserie
{

    public function criarSerie(string $nomeSerie,
    int $qtdTemporadas, 
    int $epPorTemporada
): serie
    {   
                //dd($request);
                $serie = Serie::create(['nome' => $nomeSerie]);
                $qtdTemporadas = $qtdTemporada;
                for ($i = 0; $i <= $qtdTemporadas; $i++) {
                    $temporada = $serie->temporadas()->create(['numero' => $i]);
            
                    for ($j = 1; $j <= $epPorTemporada; $j++) {
                        $temporada->episodios()->create(['numero' => $j]);
                    }
                }
            
                return $serie;
            
            }
}