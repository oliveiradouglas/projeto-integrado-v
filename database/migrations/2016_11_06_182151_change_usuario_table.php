<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsuarioTable extends Migration {
    public function up() {
        Schema::table('usuario', function ($table) {
            $table->string('remember_token');
        });
    }

    public function down() {
        //
    }
}
