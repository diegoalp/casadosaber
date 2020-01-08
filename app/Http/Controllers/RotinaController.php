<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Rotina;

class RotinaController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('arquivo') && $request->file('arquivo')->isValid()){

            $ext = $request->arquivo->extension();
            dd($ext);
            $nome = kebab_case($request->input('titulo'));
            $nomearquivo = str_pad($request->input('ensino') , 2 , '0' , STR_PAD_LEFT)."-".$nome.".".$ext;
            if($ext == "pdf") {
                $upload = $request->arquivo->storeAs('rotinas', $nomearquivo);

                $rotina = new Rotina();
                $rotina->titulo = $request->input('titulo');
                $rotina->arquivo = $nomearquivo;
                $rotina->ensino = $request->input('ensino');
                $rotina->save();

                return response(200);
            }else{
                return response(400);
            }

        }else{
            dd($request->arquivo_rotina->extension());
            return response(500, 'Não é um formato válido.');
        }
    }
}
