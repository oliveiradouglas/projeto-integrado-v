<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    protected $table    = 'cliente';
    protected $fillable = ['id_usuario'];

    public function getCartoes() {
    	return Cartao::where('id_cliente', $this->id)->get();
    }

    public function getUsuario() {
    	$usuarioLogado = \Auth::user();
    	if ($this->id_usuario == $usuarioLogado->id) {
    		return $usuarioLogado;
    	}

    	return Usuario::find($this->id_usuario);
    }
}
