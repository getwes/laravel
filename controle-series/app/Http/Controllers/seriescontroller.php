<?php
namespace App\Http\Controllers\seriescontroller;

class seriescontroller extends Controller
{

    public function listarSeries() {
        $series = [
            'Grey\'s Anatomy',
            'Lost',     
            'Agents of SHIELD'
        ];

        $html = "<ul>";
        foreach ($series as $serie){
            $html .="<li>$serie</li>";
        }
        $html .= "</ul>";

        return $html;
    }

}
?>