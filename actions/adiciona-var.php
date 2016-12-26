<?php
require_once("../view/cabecalho.php");
require_once("../Conexao/conexao.php");
require_once("../DAO/variavelDAO.php");
$con = new Conexao();
$banco = $_POST['idBanco'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];


$var = new Variavel();
$var->setIdBanco($banco);
$var->setNome($nome);
$var->setValor($valor);

$variavelDAO = new variavelDAO($con->getConexao());

if($variavelDAO->addVar($var)) {
	echo $var->getNome();
}else {
	$msg = \PDO::errorInfo($con->getConexao());;
	echo $msg;
}
die();
require_once("../view/rodape.php");