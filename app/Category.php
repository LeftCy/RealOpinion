<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function meetings() {
        //hasManyとは？
        //https://moripro.net/laravel-hasmany-belongsto/#i-5
        return $this->hasMany('App\Meeting');
    }
}
