<?php
namespace App\Http\Controllers;

use App\Serie;

use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function Index() {
        $series = serie::all();;
       // return view ('series.index', compact('series'));
     return view ( 'series.index' , [
    'series'=> $series
     ]);
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

           echo "Série com id ($serie->id) criada: ($serie->nome)";
               
           
       }

}
?>