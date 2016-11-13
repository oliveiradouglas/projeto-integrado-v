<?php

namespace App\Source\Enum;

abstract class Enum {
	protected $id;
	protected $nome;

	public abstract function __construct($tipo);

	public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }
}