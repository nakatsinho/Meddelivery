<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmaciaTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmacias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->nullable();
            $table->string('titular')->nullable();
            $table->string('nuit')->unique();
            $table->string('email')->unique();
            $table->string('location')->nullable();
            $table->string('number')->nullable();
            $table->string('imagem')->nulable();
            $table->string('descricao')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('quarteirao')->nullable();
            $table->integer('pais_id')->nullable();
            $table->integer('provincia_id')->nullable();
            $table->integer('bairro_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('image_empresa')->nulable();
            $table->string('video_link')->nullable();
            $table->enum('status', ['1', '0'])->default(0);
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
        Schema::dropIfExists('farmacias');
    }
}
