<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model {
    protected $table = 'cartao';

    protected $fillable = ['id_cliente', 'numero', 'nome', 'bandeira', 'mes', 'ano', 'cvv'];

    public function setNumeroAttribute($numero) {
    	$this->attributes['numero'] = str_replace(' ', '', $numero);
    }

    public function setNomeAttribute($nome) {
    	$this->attributes['nome'] = strtoupper($nome);
    }

    public function getFinalCartao() {
        return substr($this->numero, -4);
    }

    public static function buscarCartao($id) {
		return Cartao::where('id_cliente', \Auth::user()->getInstanciaTipo()->id)
    			->where('id', $id)
    			->firstOrFail();
    }
}
