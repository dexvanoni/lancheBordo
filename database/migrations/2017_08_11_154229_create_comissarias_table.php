<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComissariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comissarias', function (Blueprint $table) {
            $table->increments('id');
            $table->text('data');
            $table->text('unidade');
            $table->text('procedencia');
            $table->text('destino');
            $table->integer('matViatura');
            $table->integer('os');
            $table->text('prevEntrega');
            $table->text('hora');
            $table->text('duraMissao');
            $table->text('lancheApoio');
            $table->text('aguaMineral');
            $table->text('cafe');
            $table->text('gelo');
            $table->text('guardanapo');
            $table->text('copoDescAgua');
            $table->text('copoDescCafe');
            $table->text('outros');
            $table->text('postoGrad');
            $table->text('nomeGuerra');
            $table->text('atendimento');
            $table->timestamps();
    });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comissarias');
    }
}
