<?php
namespace App\Http\Controllers;

use illuminate\http\Request;

class SeriesController extends Controller
{

    public function Index(Request $request) {
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