<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Militar;

class Comissaria extends Model
{
  protected $table = 'comissarias';

  public function militares()
  {
    return $this->hasMany(Militar::class);
  }

protected $fillable = [
  'data',
  'unidade',
  'procedencia',
  'destino',
  'matViatura',
  'os',
  'prevEntrega',
  'hora',
  'duraMissao',
  'lancheApoio',
  'aguaMineral',
  'cafe',
  'gelo',
  'guardanapo',
  'copoDescAgua',
  'copoDescCafe',
  'outros',
  'postoGrad',
  'nomeGuerra',
  'created_at',
  'updated_at'
];


}
