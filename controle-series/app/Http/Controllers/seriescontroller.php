<?php
namespace App\Http\Controllers;



use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function Index() {
        $series = [
            'Grey\'s Anatomy',
            'Lost',     
            'Agents of SHIELD' 
        ];
       // return view ('series.index', compact('series'));
     return view ( 'series.index' , [
    'series'=> $series
     ]);
    } 
    public function create() {

        return view('series.create');
    }

    public function store(Request $request)
    {
        $nome = $request->nome;

        //redirect('/home/colaboradorlista')
       // return var_dump($nome);
     $serie = new Serie();
     $serie->nome = $nome;
       var_dump ($serie->save());


    }

    
}
?>