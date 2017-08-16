<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comissaria;

class Militar extends Model
{
  protected $table = 'militars';

  public function comissarias(){
    return $this->belongsTo(Commissaria::class);
  }

protected $fillable = [
  'postoG',
  'nomeCompleto',
  'om',
  'created_at',
  'updated_at'
];
}
