<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public function category() {
        //hasOne('App\User', '外部キーのカラム名', '親元のid扱いのカラム名'); といった使い方をする
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
