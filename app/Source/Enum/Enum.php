<?php

namespace App\Source\Enum;

abstract class Enum {
	protected $id;
	protected $descricao;

	public abstract function __construct($id);

	public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }
}