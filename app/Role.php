<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user(){
        return $this->belongsTo('Doomus\User');
    }
}
