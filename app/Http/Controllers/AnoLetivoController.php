<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AnoLetivo;

class AnoLetivoController extends Controller
{
    public function index()
    {
        $ano = AnoLetivo::orderBy('id', 'desc')->first();
        return json_encode($ano);
    }

    public function indexJson()
    {
        $ano = AnoLetivo::orderBy('ano','DESC')->get();
        return json_encode($ano);
    }

    public function create()
    {
        $ano = AnoLetivo::orderBy('id', 'desc')->first();
        if($ano){
            $novoano = $ano->ano + 1;
        }else{
            $anoatual = new Carbon();
            $novoano = $anoatual->year;
        }

        $anoLetivo = new AnoLetivo();
        $anoLetivo->ano = $novoano;
        $anoLetivo->save();
        return redirect('/');
    }
}
