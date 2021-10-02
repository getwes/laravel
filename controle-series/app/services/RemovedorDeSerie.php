<?php

namespace App\Services;

class RemovedorDeSerie
{
    public function removerserie(int $serieid)
    {
        $serie = Serie::find($serieid);
        $nomeSerie = $serie->nome;
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios()->each(function(Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
    
        });
        $serie->delete();
    
    }
}