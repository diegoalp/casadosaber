<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use App\User;
use App\FuncionarioUsuario;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionario = Funcionario::orderBy('id', 'DESC')->paginate(12);
        return json_encode($funcionario);
    }
    public function count()
    {
        $funcionario = Funcionario::orderBy('id', 'DESC')->get();
        return json_encode($funcionario);
    }
    public function countProfs()
    {
        $professores = Funcionario::where('cargo','=','Professor');
        $count = $professores->count();
        return json_encode( $count);
    }
    public function trashes()
    {
        $funcionario = Funcionario::onlyTrashed()->paginate(12);
        return json_encode($funcionario);
    }
    public function store(Request $request)
    {
        if($request->hasFile('perfil') && $request->file('perfil')->isValid()){
            $nome = kebab_case($request->input('nome'));
            $ext = $request->perfil->extension();

            $nomeimagem = "$nome.$ext";

            $upload = $request->perfil->storeAs('/imagens/funcionarios', $nomeimagem);
        } else {
            $nomeimagem = "sem_foto.png";
        }
        $funcionario = new Funcionario();
        $funcionario->nome = $request->input('nome');
        $funcionario->foto = $nomeimagem;
        $funcionario->data_nasc = $request->input('data_nasc');
        $funcionario->tipo_sanguineo = $request->input('tipo_sanguineo');
        $funcionario->sexo = $request->input('sexo');
        $funcionario->cpf = $request->input('cpf');
        $funcionario->rg = $request->input('rg');
        $funcionario->naturalidade = $request->input('naturalidade');
        $funcionario->escolaridade = $request->input('escolaridade');
        $funcionario->cargo = $request->input('cargo');
        $funcionario->salario = str_replace(',','.',str_replace('.', '', substr($request->input('salario'),2)));
        $funcionario->data_admissao = $request->input('data_admissao');
        $funcionario->endereco = $request->input('endereco');
        $funcionario->bairro = $request->input('bairro');
        $funcionario->cidade = $request->input('cidade');
        $funcionario->estado = $request->input('estado');
        $funcionario->cep = $request->input('cep');
        $funcionario->celular = $request->input('celular');
        $funcionario->estagio = $request->input('estagio');
        $funcionario->save();

        if($request->input('cargo') == 'Professor' || $request->input('cargo') == 'Aux. Administrativo'){
            $user = new User();
            $user->name = $request->input('nome');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('senha'));
            $user->user_type = $request->input('nivel_acesso');
            $user->save();

            $funcuser = new FuncionarioUsuario();
            $funcuser->funcionario_id = $funcionario->id;
            $funcuser->user_id = $user->id;
            $funcuser->save();

            return response('OK', 200);
        }else{
            return response('OK', 200);
        }

    }
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        if (isset($funcionario)) {
            $funcionario->delete();
            return response('OK', 200);
        }
        return response('Funcionário não encontrado', 404);
    }
    public function forceDestroy($id)
    {
        $func = Funcionario::withTrashed()->find($id);
        if (isset($func)) {
            $func->forceDelete();
            return response('OK', 200);
        }
        return response('Funcionário não encontrado', 404);
    }

    public function restaurar($id)
    {
        $func = Funcionario::withTrashed()->find($id);
        if (isset($func)) {
            $func->restore();
            return response('OK', 200);
        }
        return response('Funcionário não encontrado', 404);
    }
}
