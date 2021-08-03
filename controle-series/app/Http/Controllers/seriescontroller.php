<?php
namespace App\Http\Controllers;

use App\Serie;

use Illuminate\Http\Request;

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

    public function store (Request $request)
    {
        //redirect('/home/colaboradorlista')
       // return var_dump($nome);
           $nome = $request->nome;
           //$serie = new Serie();
           //$serie->nome = $nome;
           //var_dump($serie->save());
           $serie = Serie::create($request->all());

           $request->session()->flash('mensagem',"series{$serie->id} criada com sucesso {$serie->nome}");

           
               
           return redirect('/series');
       }

}
?>