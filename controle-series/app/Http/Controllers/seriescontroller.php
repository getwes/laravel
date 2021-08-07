<?php
namespace App\Http\Controllers;

use App\Serie;

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
           $serie = Serie::create($request->all());
                               //put
           $request->session()->flash('mensagem',"series{$serie->id} criada com sucesso {$serie->nome}");

           
               
           return redirect()->route('listar_series');
       }

       public function destroy(request $request){
           Serie::destroy ($request->id);
           $request->session()
           ->flash(
               'mensagem' ,"serie removida com sucesso"
           );
           return redirect ()->route('listar_series');

       }

}
?>