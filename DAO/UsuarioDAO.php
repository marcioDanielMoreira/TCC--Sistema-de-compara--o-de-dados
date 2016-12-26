<?php 
	class UsuarioDAO{
		private $conexao;

		function __construct($conexao){
		$this->conexao = $conexao;
	}

	function cadastrar(Usuario $usuario){
		$query = "INSERT INTO usuario(email,senha) VALUES (:email,:senha);";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":email", $usuario->getEmail());
		$stm->bindValue(":senha", $usuario->getSenha());
		return $stm->execute();
	}

	function buscaUsuario($email,$senha){
		$query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha;";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":email", $email);
		$stm->bindValue(":senha", $senha);
		$stm->execute();
		return $obj = $stm->fetchall(PDO::FETCH_CLASS,'Usuario');
	}

	function busca($email){
		$query = "SELECT * FROM usuario WHERE email = :email;";

		$stm = $this->conexao->prepare($query);
		$stm->bindValue(":email", $email);
		$stm->execute();
		return $obj = $stm->fetchall(PDO::FETCH_CLASS,'Usuario');
	}

	}

