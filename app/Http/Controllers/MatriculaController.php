<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\AnoLetivo;
use Carbon\Carbon;

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
    public function store(Request $request)
    {
        $ano = AnoLetivo::orderBy('id', 'desc')->first();
        $matricula = new Matricula();
        $matricula->turma_id = $request->input('turma');
        $matricula->aluno_id = $request->input('aluno');
        $matricula->educaMais = $request->input('educamais');
        $matricula->bolsista = $request->input('bolsista');
        $matricula->mensalidade = str_replace(',','.',str_replace('.', '', substr($request->input('mensalidade'),2)));;
        $matricula->status = 1;
        $matricula->dia_vencimento = 10;
        $matricula->ano_id = $ano->id;
        $matricula->data_matricula = new Carbon();
        $matricula->save();
        
        return response(200);
    }
}
