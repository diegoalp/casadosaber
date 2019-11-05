<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionarioUsuario extends Model
{
    protected $table = 'funcionario_usuario';

    public function usuario(){
        return $this->hasOny('App\User', 'id', 'user_id');
    }

    public function funcionario(){
        return $this->hasOny('App\Funcionario', 'id', 'funcionario_id');
    }
}
