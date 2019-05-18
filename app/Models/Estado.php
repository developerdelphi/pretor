<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends BaseModel
{
    protected $table = 'estados';

    protected $fillable = ['sigla', 'descricao'];

    public static function listEstados(){
        return static::orderBy('descricao')->pluck('descricao','id');
    }
}
