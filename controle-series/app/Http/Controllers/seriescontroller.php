<?php
namespace App\Http\Controllers;

use App\Models\Serie;

 use App\Models\Temporada;

 use App\Models\Episodio;

 use  App\Services\RemovedorDeSerie;


use App\services\CriadorDeSerie;

use Illuminate\Http\Request;

use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{

    public function Index(request $request) {
        $series = serie::query()-> orderby('nome')->get();
       // return view ('series.index', compact('series'));
       $mensagem= $request->session()->get('mensagem');
       //$request->session()->remove('mensagem');
       return view('series.index', compact('series','mensagem'));

    } 
    public function create() {

        return view('series.create');
    }
                          
    public function store (seriesformrequest $request, CriadorDeSerie $CriadorDeSerie)
    {
     $serie = $CriadorDeSerie->criarSerie(
         $request->nome, 
     $request->qtd_Temporadas, 
     $request->ep_por_temporada);
   
    $request->session()
        ->flash(
            'mensagem',
            "Série {$serie->id} e duas temporadas e episódios criados com sucesso {$serie->nome}"
        );

    return redirect()->route('listar_series');
}
       

public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
{
    $nomeSerie = $removedorDeSerie->removerSerie($request->id);

    $request->session()
        ->flash(
            'mensagem',
            "Série $nomeSerie removida com sucesso"
        );
    return redirect()->route('listar_series');
}
public function editaNome($id, Request $request)
{
    $novoNome = $request->nome;
    $serie = Serie::find($id);
    $serie->nome = $novoNome;
    $serie->save();
}

}
?>