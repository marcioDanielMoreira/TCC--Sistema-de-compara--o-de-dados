<?php

class variavelDAO{
	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
	}

	function addVar(Variavel $variavel){
		$query = "INSERT INTO vref (idBanco, nome, valor) VALUES (:idBanco,:nome,:valor);";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":idBanco",$variavel->getIdBanco());
		$stm->bindValue(":nome",$variavel->getNome());
		$stm->bindValue(":valor",$variavel->getValor());
		return $stm->execute();
	}

	function listVar($id) : array {
		$query = "SELECT * FROM vref WHERE vref.idBanco = :id ;";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":id",$id);
		$stm->execute();
		$variaveis = array();
		while ($variavel = $stm->fetchall(PDO::FETCH_CLASS,'Variavel')) {
			array_push($variaveis, $variavel);
		}
		return $variaveis;
	}

	function buscaVar($id){
		$query = "SELECT * FROM vref WHERE vref.idBanco = :id;";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":id", $id);
		$stm->execute();
		$variaveis = array();
		while ($variavel = $stm->fetchall(PDO::FETCH_CLASS,'Variavel')) {
			array_push($variaveis, $variavel);
		}

		return $variaveis;
	}

	function temporaria($id,$file){ //Aqui jogamos passamos os dados do arquivo CSV para a tabela de entrada no Banco!
		
		$fh = fopen($file['tmp_name'],'r+');

		try{
			$query = "INSERT INTO vent (idUsuario,nome,valor,tipo) VALUES ('{$id}',?,?,?);" ;
			$stm = $this->conexao->prepare($query);
			

			fgets($fh);

			while(($row = fgetcsv($fh,0,",")) !== false){
				$stm->execute($row);
			}

			fclose($fh);
		} catch(PDOException $e){
			die($e->getMessage());
		}		
	}

	function compararOKS($id,$bancoID){ // Faz a primeira comparação dos que estão corretos
		$query = "INSERT INTO saida(idUsuario,nome,valor,resultado)
                  SELECT :id,vent.nome,vent.valor,'OK' FROM vent,vref WHERE vref.idBanco = :banco AND vent.nome = vref.nome AND (vent.valor = vref.valor OR vent.valor<>'-');";

                  $stm = $this->conexao->prepare($query);
                  $stm->bindValue(":id", $id);
                  $stm->bindValue(":banco", $bancoID);
                  return $stm->execute();
	}

	function compararNOKS($id,$bancoID){ // Faz a comparação dos que não estão corretos
		$query = "INSERT INTO saida(idUsuario,nome,valor,resultado)
                  SELECT :id,vent.nome,vent.valor,'NOK' FROM vent,vref WHERE vref.idBanco = :banco AND vent.nome = vref.nome AND vent.valor <> vref.valor;";

                  $stm = $this->conexao->prepare($query);
                  $stm->bindValue(":id", $id);
                  $stm->bindValue(":banco", $bancoID);
                  return $stm->execute();
	}

	function listaResultado($idUsuario){ //Listagem para exibição na tela 
		$query = "SELECT * FROM saida WHERE saida.idUsuario = :id;";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":id",$idUsuario);
		$stm->execute();
		$variaveis = array();
		while ($variavel = $stm->fetchall(PDO::FETCH_CLASS,'Variavel')) {
			array_push($variaveis, $variavel);
		}
		return $variaveis;
	}

	function listaResultadoParaDownload($idUsuario){ //Listagem para gerar o download e criação do arquivo CSV!
		$query = "SELECT * FROM saida WHERE saida.idUsuario = :id;";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":id",$idUsuario);
		$stm->execute();
		$variaveis = array();
		while ($variavel = $stm->fetch()) {
			array_push($variaveis, $variavel);
		}
		return $variaveis;
	}

	function deletaSaidaUser($id){// após ser feito o download são deletadas as inserções!
		$query = "DELETE FROM saida WHERE saida.idUsuario = :id;";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":id",$id);
		$stm->execute();
	}
    
    function deletaVentUser($id){
        $query = "DELETE FROM vent WHERE vent.idUsuario = :id;";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":id",$id);
		$stm->execute();
    }
}
