<?php

namespace App\Source\Motoboy;

class Status extends \App\Source\Enum\Enum {
	const DISPONIVEL   = 1;
	const INDISPONIVEL = 2;

	private $label;

	public function __construct($tipo) {
		$this->id = $tipo;

		switch ($tipo) {
			case self::DISPONIVEL:
				$this->descricao = 'Disponível';
				$tipoLabel  	 = 'success';
				break;
			case self::INDISPONIVEL:
				$this->descricao = 'Indisponível';
				$tipoLabel       = 'danger';
				break;
			default:
				throw new \DomainException('O status informado não existe!');
		}
		
		$this->label = "<span class='label label-{$tipoLabel} cursorD'>{$this->descricao}</span>";
	}

    public function getLabel() {
        return $this->label;
    }
}