<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration {
    public function up() {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario', 'cliente_usuario')
                ->references('id')
                ->on('usuario');
            
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('cliente');
    }
}
