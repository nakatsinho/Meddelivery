<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosProdutoTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tax')->nullable();
            $table->integer('total')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('pedido_id')->nullable();
            $table->integer('qty')->nullable();;
            $table->unsignedInteger('farmacia_id')->nullable();
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
        Schema::dropIfExists('pedido_product');
    }
}
