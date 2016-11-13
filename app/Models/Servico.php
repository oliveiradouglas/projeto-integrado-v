<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model {
	protected $table = 'servico';

	protected $fillable = [
		'status', 'endereco_origem', 'endereco_destino', 'preco', 'avaliado', 'observacoes', 'id_cliente', 'id_motoboy', 'id_cartao'
	];

	public function getCreatedAtAttribute($createdAt) {
		return (new \DateTime($createdAt))->format('d/m/Y');
	}

	public function getPrecoAttribute($preco) {
		return number_format($preco, 2, ',', '.');
	}

	public function setPrecoAttribute($preco) {
		$this->attributes['preco'] = str_replace(['.', ','], ['', '.'], $preco);
	}

	public function getStatus() {
    	return new \App\Source\Servico\Status($this->status);
    }

    public function getMotoboy() {
    	return Motoboy::find($this->id_motoboy);
    }

    public function getCliente() {
    	return Cliente::find($this->id_cliente);
    }

    public static function buscarPorId($id) {
    	return Servico::where('id_' . \Auth::user()->getIdentificacaoTipo(),\Auth::user()->getInstanciaTipo()->id)
		            ->where('id', $id)
		            ->firstOrFail();
    }
}
