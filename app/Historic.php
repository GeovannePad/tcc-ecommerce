<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    public function user(){
        return $this->belongsTo('Doomus\User');
    }
}
