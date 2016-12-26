<?php
require_once("../viewSistem/cabecalho.php");
require_once("../Conexao/conexao.php");
require_once("../DAO/UsuarioDAO.php");
require_once("logica-user.php");

$con = new Conexao();

$usuarioDAO = new UsuarioDAO($con->getConexao());

$email = $_POST['email'];
$senha = md5($_POST['senha']);



$user = $usuarioDAO->buscaUsuario($email,$senha);

if($user == null){
	header("Location: ../view/index.php");
} else {
	$_SESSION["success"] = "Logado com sucesso.";
	logaUsuario($user[0]->getEmail());
	header("Location: ../view/cadastro_banco.php");
}
die();

require_once("../viewSistem/rodape.php");

