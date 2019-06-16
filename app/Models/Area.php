<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kind;

class Area extends BaseModel
{
    protected $fillable = ['name', 'origin'];
    //protected $dateFormat = 'd/m/Y';

    public function kinds()
    {
        return $this->hasMany(Kind::class, 'id', 'area_id');
    }

    public static function listAreas()
    {
        return static::orderBy('name')->pluck('name', 'id');
    }

    public function originValue($origin = NULL)
    {
        $optOrigin = [
            'Judicial' => 'Judicial',
            'Administrativo' => 'Administrativo'
        ];

        if (!$origin) return $optOrigin;

        return $optOrigin[$origin];
    }
}
