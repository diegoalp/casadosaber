<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoPai extends Model
{
    protected $table = 'alunos_pais';

    public function aluno(){
        return $this->hasOne('App\Aluno', 'id', 'aluno_id');
    }

    public function pai(){
        return $this->hasOne('App\Pai', 'id', 'pai_id');
    }
}
