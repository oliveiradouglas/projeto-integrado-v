<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    protected $table = 'cliente';

    public function getCartoes() {
    	return Cartao::where('id_cliente', $this->id)->get();
    }
}
