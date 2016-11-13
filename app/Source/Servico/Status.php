<?php

namespace App\Source\Servico;

class Status extends \App\Source\Enum\Enum {
	const EM_ANDAMENTO = 1;
	const FINALIZADO   = 2;

	private $label;

	public function __construct($tipo) {
		$this->id = $tipo;

		switch ($tipo) {
			case self::EM_ANDAMENTO:
				$this->nome = 'Em andamento';
				$tipoLabel  = 'warning';
				break;
			case self::FINALIZADO:
				$this->nome = 'Finalizado';
				$tipoLabel  = 'success';
				break;
			default:
				throw new \DomainException('O status informado não existe!');
		}
		
		$this->label = "<span class='label label-{$tipoLabel} cursorD'>{$this->nome}</span>";
	}

    public function getLabel() {
        return $this->label;
    }
}