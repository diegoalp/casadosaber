<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;

class TurmasController extends Controller
{
    public function indexJson()
    {
        $turma = Turma::orderBy('titulo', 'asc')->paginate(10);
        return json_encode($turma);
    }
    public function turmasAnoAtual()
    {
        $ano = \App\AnoLetivo::orderBy('id', 'desc')->first();
        $turma = Turma::with("anoletivo")->where('ano_id',$ano->id)->orderBy('titulo', 'asc')->get();
        return json_encode($turma);
    }
    public function store(Request $request)
    {
        $turma = new Turma();
        $turma->titulo = $request->input('titulo');
        $turma->hora_entrada = $request->input('hora_entrada');
        $turma->hora_saida = $request->input('hora_saida');
        $turma->turno = $request->input('turno');
        $turma->ensino = $request->input('ensino');
        $turma->ano_id = $request->input('ano_letivo');
        $turma->save();

        return response('OK', 200);
    }

    public function destroy($id)
    {
        $turma = Turma::find($id);
        if (isset($turma)) {
            $turma->delete();
            return response('OK', 200);
        }
        return response('Turma não encontrada', 404);
    }



}
