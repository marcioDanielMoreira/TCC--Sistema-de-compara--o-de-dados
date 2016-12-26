<?php
require_once("../view/cabecalho.php");
require_once("../Conexao/conexao.php");
require_once("../DAO/bancoDAO.php");
$con = new Conexao();
$nome = $_POST['nome'];

$banco = new Banco();
$banco->setNome($nome);

$bancoDAO = new bancoDAO($con->getConexao());

if($bancoDAO->addBanco($banco)){ ?> 
	<p class="text-success">O Banco <?= $banco->getNome()?> foi cadastrado!</p>
<?php }else{
	$msg = \PDO::errorInfo($con->getConexao());
?>
	<p class="text-danger">O Banco <?= $banco->getNome()?> não foi cadastrado : <?= $msg ?></p>
<?php
} 
?>
<?php
die(); 
require_once("../view/rodape.php");?>