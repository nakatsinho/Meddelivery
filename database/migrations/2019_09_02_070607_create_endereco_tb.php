<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomecompleto')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('pincode')->nullable();
            $table->string('detalhes')->nullable();
            $table->integer('pais_id')->nullable();
            $table->integer('provincia_id')->nullable();
            $table->integer('id_pagamento')->nullable();
            $table->integer('bairro_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('image')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('endereco');
    }
}
