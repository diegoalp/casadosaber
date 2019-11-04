<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    public function anoletivo()
    {
        return $this->hasOne('App\AnoLetivo','id', 'ano_id');
    }
}
