<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\AnoLetivo;

class MatriculaController extends Controller
{
    public function matriculaAluno($id)
    {
        $ano = AnoLetivo::orderBy('id', 'desc')->first();
        $matricula = Matricula::where('aluno_id', '=', $id)
        ->where('ano_id','=', $ano->id)
        ->join('turmas','matriculas.turma_id','=', 'turmas.id')
        ->select('matriculas.*','turmas.*')
        ->get();
        return json_encode($matricula);
    }
}
