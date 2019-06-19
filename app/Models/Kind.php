<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class Kind extends BaseModel
{
    protected $fillable = ['name', 'area_id'];
    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['area:id,name,origin'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
