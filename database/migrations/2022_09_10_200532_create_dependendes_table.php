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
        Schema::create('dependendes', function (Blueprint $table) {
            $table->id();
            $table->index('id');
            $table->integer('id_funcionario')->unsigned();
            $table->string('name');
            $table->string('cpf');
            $table->date('nasc');
            $table->string('parentesco');
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
        Schema::dropIfExists('dependendes');
    }
};
