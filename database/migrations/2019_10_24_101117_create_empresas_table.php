<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->nullable();
            $table->string('endereco')->nullable();
            $table->string('endereco1')->nullable();
            $table->string('endereco2')->nullable();
            $table->string('nuit')->nullable();
            $table->string('contacto1')->nullable();
            $table->string('contacto2')->nullable();
            $table->string('licenca')->nullable();
            $table->string('director')->nullable();
            $table->string('logo')->nullable();
            $table->integer('funcionarios')->nullable();
            $table->integer('qty')->nullable();
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
        Schema::dropIfExists('empresa');
    }
}
