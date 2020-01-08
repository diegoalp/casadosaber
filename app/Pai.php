<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pai extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    function aluno(){
        return $this->belongsToMany('App\AlunoPai','id','pai_id');
    }

    function usuario(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
