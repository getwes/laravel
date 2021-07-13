<?php
namespace App\Http\Controllers;

class SeriesController extends Controller
{

    public function Index() {
        $series = [
            'Grey\'s Anatomy',
            'Lost',     
            'Agents of SHIELD'
        ];

     return view (view: 'series.index' , [
    'series'=> $series
     ]);
    }

}
?>