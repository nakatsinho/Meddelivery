<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_pro')->nullable();
            $table->string('codigo_pro')->nullable();
            $table->integer('preco_pro')->nullable();
            $table->string('info_pro')->nullable();
            $table->string('image')->nulable();
            $table->integer('spl_price')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('category_id')->nullable(); 
            $table->integer('subcategory_id')->nullable(); 
            $table->unsignedInteger('farmacia_id')->nullable();
            $table->enum('status', ['1', '0'])->default('1');
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
        Schema::dropIfExists('produtos');
    }
}
