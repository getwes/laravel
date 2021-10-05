<?php

namespace App\Services;

use App\Models\{serie, temporada, Episodio};

use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie(int $serieId)//: string Public function removerserie(): string <——- aqui depois dos : pontos vc declara o tipo de retorno do método/E no seu caso tá especificado que retorna string/Se não retornar nada ele vai reclamar .. que deve ter sido o caso //
    {
        $nomeSerie = '';
        //recebe uma função e tudo que tiver nessa função vai estar dentro de uma transação só//
        DB::transaction( function () use ($serieId, &$nomeSerie){

            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            $serie->temporadas->each(function (Temporada $temporada) {
                $temporada->episodios()->each(function(Episodio $episodio) {
                    $episodio->delete();
                });
                $temporada->delete();

            });
            $serie->delete();

            return $nomeSerie;
        });

    }
}
?>