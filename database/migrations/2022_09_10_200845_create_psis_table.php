<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psis', function (Blueprint $table) {
            $table->id();
            $table->index('id');
            $table->integer('id_cargo')->unsigned();
            $table->integer('id_setor')->unsigned();
            $table->date('data_inicial');
            $table->date('data_final');
            $table->integer('funcionario_responsavel')->unsigned();
            $table->boolean('convertido');
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
        Schema::dropIfExists('psis');
    }
};
