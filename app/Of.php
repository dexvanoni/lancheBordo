<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Of extends Model
{
  protected $connection = 'pgsql';
  protected $table = 'ofs';
  protected $fillable = ['saram', 'nome', 'posto', 'contato', 'esquadrao'];
}
