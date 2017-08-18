<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmRancho extends Model
{
  protected $table = 'adm_ranchos';
  protected $fillable = ['nome', 'login', 'senha'];
}
