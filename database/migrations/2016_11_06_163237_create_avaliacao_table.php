<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoTable extends Migration {
    
    public function up() {
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nota');
            $table->integer('id_motoboy')->unsigned();
            $table->foreign('id_motoboy', 'avaliacao_motoboy')
                ->references('id')
                ->on('motoboy');
            
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('avaliacao');
    }
}
