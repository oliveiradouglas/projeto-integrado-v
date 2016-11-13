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
				$this->descricao = 'Em andamento';
				$tipoLabel       = 'warning';
				break;
			case self::FINALIZADO:
				$this->descricao = 'Finalizado';
				$tipoLabel       = 'success';
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