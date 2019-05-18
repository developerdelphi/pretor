<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends BaseModel
{
    protected $table = 'paises';

    protected $fillable = ['descricao'];

    public static function listPaises(){
        return static::orderBy('descricao')->pluck('descricao','id');
    }
}
