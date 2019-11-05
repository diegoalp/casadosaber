<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexJson()
    {
        $usuarios = User::orderBy('id','DESC')->paginate(10);
        return json_encode($usuarios);
    }
    public function countUsers()
    {
        $usuarios = User::all();
        $count = $usuarios->count();
        return json_encode( $count);
    }
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('senha'));
        $usuario->user_type = $request->input('nivel_acesso');
        $usuario->save();

        return response('OK', 200);
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        if (isset($usuario)) {
            $usuario->delete();
            return response('OK', 200);
        }
        return response('Usuário não encontrado', 404);
    }

}
