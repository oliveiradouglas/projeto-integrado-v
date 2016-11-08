<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model {
	protected $table = 'servico';

	public function getCreatedAtAttribute($createdAt) {
		return (new DateTime($createdAt))->format('Y-m-d');
	}

	public function getPrecoAttribute($preco) {
		return number_format($preco, 2, ',', '.');
	}

	public function getStatus() {
    	return new \App\Source\Servico\Status($this->status);
    }
}
