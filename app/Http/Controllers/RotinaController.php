<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Rotina;

class RotinaController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('arquivo_rotina') && $request->file('arquivo_rotina')->isValid()){

            $ext = $request->arquivo_rotina->extension();
            $nome = kebab_case($request->input('titulo'));
            $nomearquivo = str_pad($request->input('ensino') , 2 , '0' , STR_PAD_LEFT)."-".$nome.".".$ext;

            if($ext == "pdf") {
                $upload = $request->arquivo_rotina->storeAs('rotinas/', $nomearquivo);

                $rotina = new Rotina();
                $rotina->titulo = $request->input('titulo');
                $rotina->arquivo = $nomearquivo;
                $rotina->ensino = $request->input('ensino');
                $rotina->save();

                return response()->json([
                    'message'   => 'Arquivo enviado com sucesso',
                ], 200);
            }else{
                return response()->json([
                    'message'   => 'Formato não permitido. Envie um arquivo .pdf',
                ], 500);
            }

        }else{
            return response()->json([
                'message'   => 'Formato não permitido. Envie um arquivo .pdf',
            ], 500);
        }
    }
}
