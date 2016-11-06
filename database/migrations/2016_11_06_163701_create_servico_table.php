<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicoTable extends Migration {
    public function up() {
        Schema::create('servico', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status');
            $table->string('endereco_origem', 100);
            $table->string('endereco_destino', 100);
            $table->decimal('preco', 12);
            $table->boolean('avaliado');
            $table->text('observacoes');
            
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente', 'servico_cliente')
                ->references('id')
                ->on('cliente');

            $table->integer('id_motoboy')->unsigned();
            $table->foreign('id_motoboy', 'servico_motoboy')
                ->references('id')
                ->on('motoboy');
            
            $table->integer('id_cartao')->unsigned();
            $table->foreign('id_cartao', 'servico_cartao')
                ->references('id')
                ->on('cartao');

            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('servico');
    }
}
