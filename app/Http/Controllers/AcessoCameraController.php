<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcessoCameraController extends Controller
{
    public function store(Request $request)
    {
        try{
            if($request->hasFile('acesso_cameras') && $request->file('acesso_cameras')->isValid()) {

                $ext = $request->acesso_cameras->extension();

                $nomearquivo = "acesso-cameras." . $ext;

                if($ext == "pdf"){

                    Storage::delete("/public/acessocameras/acesso-cameras.pdf");

                    $upload = $request->acesso_cameras->storeAs('acessocameras', $nomearquivo);

                    return response()->json([
                        'message'   => 'Arquivo enviado com sucesso',
                    ], 200);

                }else{

                    return response()->json([
                        'message'   => 'Formato não permitido. Envie um arquivo .pdf',
                    ], 500);
                }
            }
        }catch(Exception $e) {

            return response()->json([
                'message'   => 'Erro ao enviar o arquivo.',
            ], 500);

        }
    }
}
