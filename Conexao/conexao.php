<?php
#$conexao = mysqli_connect("localhost","root","","bancodados");
class Conexao{
	public static function getConexao(){
	$pdo = new \PDO('mysql:host=localhost;dbname=tcc','root','');
		$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		return $pdo;
	}
}
