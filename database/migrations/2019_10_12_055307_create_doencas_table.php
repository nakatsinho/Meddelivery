<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoencasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doencas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comum')->nullable();
            $table->string('hereditaria')->nullable();
            $table->string('alergias')->nullable();
            $table->string('contras')->nullable();
            $table->string('hospitalizacao')->nullable();
            $table->string('vacinas')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('doencas');
    }
}
