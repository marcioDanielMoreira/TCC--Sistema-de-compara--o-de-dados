<?php 
require_once("../view/cabecalho.php");
require_once("../Conexao/conexao.php");
require_once("../DAO/bancoDAO.php");

$con = new Conexao();
$bancoDAO = new bancoDAO($con->getConexao());

$id = $_POST['id'];
$bancoDAO->removeBanco($id);

header("Location: ../view/lista_banco.php");

require_once("../view/rodape.php");
