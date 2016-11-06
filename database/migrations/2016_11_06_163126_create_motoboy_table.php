<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotoboyTable extends Migration {
    public function up() {
        Schema::create('motoboy', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario', 'motoboy_usuario')
                ->references('id')
                ->on('usuario');
            
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('motoboy');
    }
}
