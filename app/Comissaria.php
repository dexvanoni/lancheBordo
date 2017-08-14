<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Militar;

class Comissaria extends Model
{
  public function militares(){
  return $this->hasMany(Militar::class);
}



}
