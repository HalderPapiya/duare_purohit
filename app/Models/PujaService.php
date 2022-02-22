<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PujaService extends Model
{
    use SoftDeletes;

    public function pujaDetail()
    {
        return $this->belongsTo('App\Models\Puja', 'pujaId', 'id');
    }
}