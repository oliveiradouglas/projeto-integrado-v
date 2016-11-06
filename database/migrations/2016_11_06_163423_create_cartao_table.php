<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartaoTable extends Migration {
    public function up() {
        Schema::create('cartao', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('numero');
            $table->string('nome', 50);
            $table->string('bandeira', 20);
            $table->integer('mes');
            $table->integer('ano');
            $table->integer('cvv');
            
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente', 'cartao_cliente')
                ->references('id')
                ->on('cliente');
            
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('cartao');
    }
}
