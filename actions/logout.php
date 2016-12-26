<?php
require_once("logica-user.php");

logout();
$_SESSION["success"] = "Deslogado com Sucesso.";
header("Location: ../viewSistem/index.php");
die();