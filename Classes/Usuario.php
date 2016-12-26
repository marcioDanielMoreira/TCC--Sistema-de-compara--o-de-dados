<?php
	class Usuario{
		private $idUsuario;
		private $email;
		private $senha;

		public function getId(){
			return $this->idUsuario;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}
	}