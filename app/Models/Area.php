<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\Kind;

class Area extends BaseModel
{
    protected $fillable = ['name', 'origin'];
    //protected $dateFormat = 'd/m/Y';
    protected $appends = ['name_origin'];

    public function kinds()
    {
        return $this->hasMany(Kind::class);
    }

    public function getNameOriginAttribute()
    {
        return "{$this->name}/{$this->origin}";
    }

    public static function listAreas()
    {
       //return Area::select(DB::raw("CONCAT('name','origin') AS name_origin"), 'id')->get()->pluck('name_origin', 'id');
        //return Area::get('id', 'name', 'origin')->pluck('name_origin', 'id');
        //return Area::get();//('id','name_origin');
        //$list = collect();
        $areas = Area::orderBy('name', 'DESC')->get('id','name_origin');
        //$areas->get('id', 'name_origin');

        return $areas;

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
