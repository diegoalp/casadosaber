<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function usuario(){
        return $this->belongsTo('App\FuncrionarioUsuario', 'id', 'funcionario_id');
    }
}
