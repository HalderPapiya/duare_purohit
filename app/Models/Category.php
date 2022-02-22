<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;

    public function puja()
    {
        return $this->hasMany('App\Models\Puja', 'categoryId', 'id');
    }
}