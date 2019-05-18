<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends BaseModel
{
    protected $fillable = ['name', 'origin'];
    //protected $dateFormat = 'd/m/Y';

    public static function listAreas(){
        return static::orderBy('name')->pluck('name','id');
    }
    
    public function originValue($origin = NULL)
    {
      $optOrigin = [
        'Judicial' => 'Judicial',
        'Administrativo' => 'Administrativo'
      ];
      
      if(!$origin) return $optOrigin;
      
      return $optOrigin[$origin];
    }
}
