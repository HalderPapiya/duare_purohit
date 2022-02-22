<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Puja extends Model
{
    use SoftDeletes;

    public function categoryDetail()
    {
        return $this->belongsTo('App\Models\Category', 'categoryId', 'id');
    }
    public function services()
    {
        return $this->hasMany('App\Models\PujaService', 'pujaId', 'id');
    }
}