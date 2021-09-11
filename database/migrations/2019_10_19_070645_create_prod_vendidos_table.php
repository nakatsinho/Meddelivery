<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdVendidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_vendidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('pro_id');
            $table->unsignedInteger('farmacia_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('quantidade')->nullable();
            $table->string('preco_prod')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('prod_vendidos');
    }
}
