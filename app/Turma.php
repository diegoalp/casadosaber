<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function alunos()
    {
        return $this->hasMany('App\Matricula','id', 'turma_id');
    }
}
