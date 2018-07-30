<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstoquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sku')->unsigned();
            $table->foreign('sku')->references('sku')->on ('produtos')->onDelete('cascade');
            $table->integer('quantidade')->default(0);
            $table->enum('tipo',['e','s']);
            $table->enum('api',['s','n'])->default('n');
            $table->string('obs');
            $table->dateTime('data');
            $table->string('user');
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
        Schema::dropIfExists('estoques');
    }
}
