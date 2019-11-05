<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pai extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    function pai(){
        return $this->belongsToMany('App\Pai','alunos_pais', 'aluno_id', 'id');
    }

    function usuario(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
