<?php

namespace App\Services;

use App\Models\{serie, temporada, Episodio};

use Iluminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerserie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction(function ()  use ($serieId ,& $nomeSerie){
        $serie = Serie::find($serieId);
        $nomeSerie = $serie->nome;
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios()->each(function(Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
    
        });
        $serie->delete();
    });

        return $nomeSerie;


   
    } 
    
}