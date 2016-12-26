<?php
require_once("../viewSistem/cabecalho.php");
require_once("../Conexao/conexao.php");
require_once("../DAO/bancoDAO.php");
require_once("../DAO/variavelDAO.php");
require_once("../DAO/UsuarioDAO.php");
require_once("logica-user.php");

verificaUsuario();
$con = new Conexao();

$usuarioDAO = new UsuarioDAO($con->getConexao());
$user = $usuarioDAO->busca(usuarioLogado());

$bancoID = $_POST['idBanco'];

$con = new Conexao();
$variavelDAO = new variavelDAO($con->getConexao());
$bancoDAO = new bancoDAO($con->getConexao());
$variavelDAO->temporaria($user[0]->getId(),$_FILES['file']);

$variavelDAO->compararOKS($user[0]->getId(),$bancoID);
$variavelDAO->compararNOKS($user[0]->getId(),$bancoID);

header("Location: ../viewSistem/resultado.php");
#$variaveis = $variavelDAO->buscaVar($id);
#$fh = fopen($_FILES['file']['tmp_name'],'r+');
#if(!$fh){echo("<p>Arquivo nao encontrado</p>");}else{
#	$cabecalho = fgetcsv($fh,0,",");
#while(($row = fgetcsv($fh, 0, ",")) !== false){
#	echo '<pre>';
 #   print_r($row[0]);
  #  echo '</pre>';
#}
#}
#fclose($fh);
#echo '<pre>';
#print_r($lines);
#echo '</pre>';
?>
<?php require_once("../viewSistem/rodape.php"); ?>