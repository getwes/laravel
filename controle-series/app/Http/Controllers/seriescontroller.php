<?php
namespace App\Http\Controllers;

use App\Serie;

use Illuminate\Http\Request;

use App\Http\Requests\SeriesFormRequest;

use App\models\temporada;

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
                           // request
    public function store (seriesformrequest $request)
    {
      //  $request->validate([
         //   'nome' => 'required|min:'
       // ]);
       //********************************************************
        //redirect('/home/colaboradorlista')
       // return var_dump($nome);
           $nome = $request->nome;
           //$serie = new Serie();
           //$serie->nome = $nome;
           //var_dump($serie->save());
    $serie = Serie::create(['nome' => $request->nome]);
    $qtdTemporadas = $request->qtd_temporadas;
    for ($i = 1; $i <= $qtdTemporadas; $i++) {
        $temporada = $serie->temporadas()->create(['numero' => $i]);

        for ($j = 1; $j <= $request->ep_por_temporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
    $request->session()
        ->flash(
            'mensagem',
            "Série {$serie->id} e duas temporadas e episódios criados com sucesso {$serie->nome}"
        );

    return redirect()->route('listar_series');
}
       

       public function destroy (request $request){
           Serie::destroy ($request->id);
           $request->session()
           ->flash(
               'mensagem' ,"serie removida com sucesso"
           );
           return redirect ()->route('listar_series');

       }

}
?>