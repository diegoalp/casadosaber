<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Pai;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with('pai')->orderBy('id', 'DESC')->paginate(5);
        return json_encode($alunos);
    }

    public function count()
    {
        $alunos = Aluno::orderBy('id', 'DESC')->get();
        return json_encode($alunos);
    }

    public function trashes()
    {
        $alunos = Aluno::with('responsaveis')->orderBy('id', 'DESC')->onlyTrashed()->get();
        return json_encode($alunos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $responsavel = Pai::where('cpf', '=', $request->input('cpf'))->first();
        $qtdAlunos = Aluno::withTrashed()->count() + 1;
        $dataAtual = new Carbon();
        $data = $dataAtual->format('Y');

        $numero = str_pad($qtdAlunos , 4 , '0' , STR_PAD_LEFT);

        $matricula = $data."-".$numero;

        if($request->hasFile('perfil') && $request->file('perfil')->isValid()){
            $nome = kebab_case($request->input('nomeAluno'));
            $ext = $request->perfil->extension();

            $nomeimagem = $matricula."-".$nome.".".$ext;


            $upload = $request->perfil->storeAs('/imagens/alunos/'.$matricula, $nomeimagem);
        } else {
            $nomeimagem = "sem_foto.png";
        }

        if($responsavel){
            $aluno = new Aluno();
            $aluno->nome = $request->input('nome');
            $aluno->matricula = $matricula;
            $aluno->foto = $nomeimagem;
            $aluno->data_nasc = \Carbon\Carbon::parse($request->input('data_nasc'))->format('Y/m/d');
            $aluno->nacionalidade = $request->input('nacionalidade');
            $aluno->endereco = $request->input('endereco');
            $aluno->bairro = $request->input('bairro');
            $aluno->cidade = $request->input('cidade');
            $aluno->estado = $request->input('estado');
            $aluno->cep = $request->input('cep');
            $aluno->sexo = $request->input('sexo');
            $aluno->tipo_sanguineo = $request->input('tipo_sanguineo');
            $aluno->save();
            $aluno->pai()->attach($responsavel);
        }else{
            if($request->input('grau_parentesco') === "Pai" || $request->input('grau_parentesco') === "Mãe"){

                $senha = Hash::make(preg_replace( '#[^0-9]#', '', $request->input('cpf')));

                $user = new User();
                $user->name = $request->input('nome_responsavel');
                $user->email = $request->input('email');
                $user->password = $senha;
                $user->user_type = "pai";
                $user->save();

                $responsavel = new Pai();
                $responsavel->nome = $request->input('nome_responsavel');
                $responsavel->grau_parentesco = $request->input('grau_parentesco');
                $responsavel->data_nasc = \Carbon\Carbon::parse($request->input('data_nasc_responsavel'));
                $responsavel->ci = $request->input('ci');
                $responsavel->cpf = $request->input('cpf');
                $responsavel->celular = $request->input('celular');
                $responsavel->user_id = $user->id;
                $responsavel->save();

            }else{
                $responsavel = new Pai();
                $responsavel->nome = $request->input('nome_responsavel');
                $responsavel->grau_parentesco = $request->input('grau_parentesco');
                $responsavel->data_nasc = \Carbon\Carbon::parse($request->input('data_nasc_responsavel'));
                $responsavel->ci = $request->input('ci');
                $responsavel->cpf = $request->input('cpf');
                $responsavel->celular = $request->input('celular');
                $responsavel->user_id = "";
                $responsavel->save();
            }
                $aluno = new Aluno();
                $aluno->nome = $request->input('nome');
                $aluno->matricula = $matricula;
                $aluno->foto = $nomeimagem;
                $aluno->data_nasc = \Carbon\Carbon::parse($request->input('data_nasc'))->format('Y/m/d');
                $aluno->nacionalidade = $request->input('nacionalidade');
                $aluno->endereco = $request->input('endereco');
                $aluno->bairro = $request->input('bairro');
                $aluno->cidade = $request->input('cidade');
                $aluno->estado = $request->input('estado');
                $aluno->cep = $request->input('cep');
                $aluno->sexo = $request->input('sexo');
                $aluno->tipo_sanguineo = $request->input('tipo_sanguineo');
                $aluno->save();

            $aluno->pai()->attach($responsavel);
        }
        return response(200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::with('responsaveis')->find($id);
        if (isset($aluno)) {
            return view('aluno.perfil',compact('aluno'));
        }
        return response('Aluno não encontrado', 404);
    }
    public function verAluno($matricula)
    {
        $aluno = Aluno::with('pai')->where('matricula','=', $matricula)->first();
        if (isset($aluno)) {
            return view('alunos.aluno_perfil',compact('aluno'));
        }
        return response('Aluno não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        return view('aluno.editar', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('perfil') && $request->file('perfil')->isValid()){
            $nome = kebab_case($request->input('nomeAluno'));
            $ext = $request->perfil->extension();

            $nomeimagem = $request->input('matricula')."-".$nome.".".$ext;
            $delete = Storage::delete("alunos/".$request->input('matricula')."/".$nomeimagem);
            $upload = $request->perfil->storeAs('alunos/'.$request->input('matricula'), $nomeimagem);
        }
        $aluno = Aluno::find($id);
        $aluno->nome = $request->input('nomeAluno');
        $aluno->data_nasc = \Carbon\Carbon::parse($request->input('data_nasc'))->format('Y/m/d');
        $aluno->naturalidade = $request->input('naturalidade');
        $aluno->nacionalidade = $request->input('nacionalidade');
        $aluno->endereco = $request->input('endereco');
        $aluno->bairro = $request->input('bairro');
        $aluno->cidade = $request->input('cidade');
        $aluno->estado = $request->input('estado');
        $aluno->cep = $request->input('cep');
        $aluno->sexo = $request->input('sexo');
        $aluno->tipo_sanguineo = $request->input('tipo_sanguineo');
        $aluno->save();

        return redirect()->route('perfilAluno',$id )->with('mensagem','Aluno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Aluno::find($id);
        if (isset($aluno)) {
            $aluno->delete();
            return response('OK', 200);
        }
        return response('Aluno não encontrado', 404);
    }

    public function forceDestroy($id)
    {
        $aluno = Aluno::withTrashed()->find($id);
        if (isset($aluno)) {
            $aluno->responsaveis()->detach();
            $aluno->forceDelete();
            return response('OK', 200);
        }
        return response('Aluno não encontrado', 404);
    }

    public function restaurar($id)
    {
        $aluno = Aluno::withTrashed()->find($id);
        if (isset($aluno)) {
            $aluno->restore();
            return response('OK', 200);
        }
        return response('Aluno não encontrado', 404);
    }
}
