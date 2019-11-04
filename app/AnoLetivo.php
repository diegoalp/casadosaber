<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnoLetivo extends Model
{
    protected $table = 'ano_letivo';

    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }
}
