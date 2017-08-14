<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Militar extends Model
{

  public function comissarias(){
    return $this->belongsTo(Commissaria::class);
  }

}
