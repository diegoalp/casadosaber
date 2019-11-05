<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    function pai(){
        return $this->belongsToMany('App\Pai','alunos_pais', 'aluno_id', 'pai_id');
    }
}
