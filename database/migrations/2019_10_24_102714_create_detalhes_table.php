<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('validade')->nulable();
            $table->string('fabricante')->nulable();
            $table->string('recomendacao')->nulable();
            $table->string('riscos')->nulable();
            $table->string('sintomas')->nulable();
            $table->integer('qty')->nullable();
            $table->integer('produto_id')->nullable();
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
        Schema::dropIfExists('detalhes');
    }
}
