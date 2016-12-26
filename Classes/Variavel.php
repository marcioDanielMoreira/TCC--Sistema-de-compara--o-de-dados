<?php
class Variavel{
	private $idVariaveis;
	private $idBanco;
	private $nome;
	private $valor;
	private $resultado;

	public function getId(){
		return $this->idVariaveis;
	}

	public function setId($idVariaveis){
		$this->idVariaveis = $idVariaveis;
	}

	public function getIdBanco(){
		return $this->banco;
	}

	public function setIdBanco($banco){
		$this->banco = $banco;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function getStatus(){
		return $this->resultado;
	}

	public function setStatus($status){
		$this->resultado = $status;
	}

}