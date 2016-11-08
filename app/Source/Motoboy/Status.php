<?php

namespace App\Source\Motoboy;

class Status {
	const DISPONIVEL   = 1;
	const INDISPONIVEL = 2;

	private $id;
	private $nome;
	private $label;

	public function __construct($tipo) {
		$this->id = $tipo;

		switch ($tipo) {
			case self::DISPONIVEL:
				$this->nome = 'Disponível';
				$tipoLabel  = 'success';
				break;
			case self::INDISPONIVEL:
				$this->nome = 'Indisponível';
				$tipoLabel  = 'danger';
				break;
			default:
				throw new \DomainException('O tipo informado não existe!');
		}
		
		$this->label = "<span class='label label-{$tipoLabel} cursorD'>{$this->nome}</span>";
	}

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getLabel() {
        return $this->label;
    }
}