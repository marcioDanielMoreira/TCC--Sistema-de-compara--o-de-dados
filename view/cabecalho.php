<?php 
function carregaClasse($nomeDaClasse){
	require_once("../Classes/".$nomeDaClasse.".php");
	}

	spl_autoload_register("carregaClasse");
	error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>ADMIN</title>
    <link rel="shortcut icon" href="../img/database.png">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/normalize.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/ajustes.css">
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><img src="../img/database.png"></a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="../view/cadastro_banco.php">Cadastrar Banco</a></li>
					<li><a href="../view/cadastro_var.php">Cadastrar Variável</a></li>
					<li><a href="../view/lista_banco.php">Listar Bancos</a></li>
				</ul>
			</div>
		</div>
	</div>