<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GiveOpinion extends Model
{
    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
