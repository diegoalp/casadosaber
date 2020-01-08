<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pai;
use App\AlunoPai;

class PaiController extends Controller
{
    public function responsaveis($id)
    {
        $responsaveis = AlunoPai::with('pai')
        ->where('aluno_id', '=', $id)
        ->get();
        return json_encode($responsaveis);
    }
}
