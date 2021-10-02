<?php

namespace App\Services;

use App\Models\{serie, temporada, Episodio};

class RemovedorDeSerie
{
    public function removerserie(int $serieid): string
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

        return $nomeSerie;

    
    }
}