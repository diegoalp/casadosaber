<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    function aluno(){
        return $this->belongsToMany('App\Aluno','id','aluno_id');
    }
    function turma(){
        return $this->belongsToMany('App\Turma','id','turma_id');
    }
    function anoletivo(){
        return $this->belongsToMany('App\AnoLetivo','id','ano_id');
    }
}
