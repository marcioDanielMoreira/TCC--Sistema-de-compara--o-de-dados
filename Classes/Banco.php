<?php

class Banco{
	private $idBanco;
	private $nome;

	public function getId(){
		return $this->idBanco;
	}
	
	public function setId($idBanco) {
		$this->idBanco = $idBanco;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}



}