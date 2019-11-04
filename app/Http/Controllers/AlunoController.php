<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnoLetivo;

class AlunoController extends Controller
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

}
