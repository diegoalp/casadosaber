<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function indexJson()
    {
        $usuarios = User::orderBy('id','DESC')->get();
        return json_encode($usuarios);
    }
    public function countUsers()
    {
        $usuarios = User::all();
        $count = $usuarios->count();
        return json_encode( $count);
    }

}
