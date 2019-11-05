<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Access\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function turmas()
    {
        return view('turmas');
    }

    public function usuarios()
    {
        return view('usuarios');
    }
    public function funcionarios()
    {
        if(\Gate::allows('isSuperAdmin') || \Gate::allows('isAdmin')){
            return view('funcionarios.listar_funcionarios');
        }else{
            abort(403, "Você não tem permissão para acessar esta página.");
        }

    }
    public function addFuncionario()
    {
        if(\Gate::allows('isSuperAdmin') || \Gate::allows('isAdmin')){
            return view('funcionarios.novo_funcionario');
        }else{
            abort(403, "Você não tem permissão para acessar esta página.");
        }
    }
    public function funcionariosRemovidos()
    {
        if(\Gate::allows('isSuperAdmin') || \Gate::allows('isAdmin')){
            return view('funcionarios.funcionarios_removidos');
        }else{
            abort(403, "Você não tem permissão para acessar esta página.");
        }
    }
    public function addAluno()
    {
        if(\Gate::allows('isSuperAdmin') || \Gate::allows('isAdmin')){
            return view('alunos.novo_aluno');
        }else{
            abort(403, "Você não tem permissão para acessar esta página.");
        }
    }
    public function alunos()
    {
        if(\Gate::allows('isSuperAdmin') || \Gate::allows('isAdmin')){
            return view('alunos.listar_alunos');
        }else{
            abort(403, "Você não tem permissão para acessar esta página.");
        }
    }
}
