<?php

namespace App\Source\Usuario;

class Tipo extends \App\Source\Enum\Enum {
	const CLIENTE = 1;
	const MOTOBOY = 2;

	public function __construct($tipo) {
		$this->id = $tipo;

		switch ($tipo) {
			case self::CLIENTE:
				$this->nome = 'Cliente';
				break;
			case self::MOTOBOY:
				$this->nome = 'Motoboy';
				break;
			default:
				throw new \DomainException('O tipo informado não existe!');
		}
	}
}