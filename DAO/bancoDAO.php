<?php
class bancoDAO{
	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
	}

	function addBanco(Banco $banco){
		$query = "INSERT INTO banco(nome) VALUES (:nome);";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":nome",$banco->getNome());
		return $stm->execute();
	}

	function listBanco() : array{
		$query = "SELECT * FROM banco;";
		$stm = $this->conexao->prepare($query);
		$stm->execute();
		$bancos = array();
		while($banco = $stm->fetchall(PDO::FETCH_CLASS, 'Banco')){
					
			array_push($bancos, $banco);
		}
		return $bancos;
	}

	function buscaBanco($id){
		$query = "SELECT * FROM banco WHERE idBanco = :id;";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":id", $id);
		
		$banco_buscado = $stm->fetch(PDO::FETCH_ASSOC, $stm->execute());

		$id = $banco_buscado['idBanco'];
		$nome = $banco_buscado['nome'];

		$banco = new Banco();
		$banco->setId($id);
		$banco->setNome($nome);

		return $banco;
	}

	function removeBanco($idBanco){
		$query = "DELETE FROM banco WHERE idBanco = :idBanco ";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":idBanco",$idBanco);
		return $stm->execute();
	}


}