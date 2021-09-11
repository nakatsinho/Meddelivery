<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('number')->nullable();
            $table->date('nascimento',100)->nullable();
            $table->string('altura')->nullable();
            $table->string('talta')->nullable();
            $table->string('tbaixa')->nullable();
            $table->string('profissao')->nullable();
            $table->string('peso')->nullable();
            $table->string('raca')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->default('default.png');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->unsignedInteger('farmacia_id')->nullable();
            $table->integer('pais_id')->nullable();
            $table->integer('doenca_id')->nullable();
            $table->integer('gsanguineo_id')->nullable();
            $table->integer('provincia_id')->nullable();
            $table->integer('sexo_id')->nullable();
            $table->unsignedInteger('user_group_id')->nullable();
            $table->boolean('admin')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
