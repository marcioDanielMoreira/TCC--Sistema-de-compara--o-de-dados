<?php
require_once("../view/cabecalho.php");
require_once("../Conexao/conexao.php");
require_once("../DAO/UsuarioDAO.php");

$con = new Conexao();

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$user = new Usuario();
$user->setEmail($email);
$user->setSenha($senha);

var_dump($user);

$usuarioDAO = new UsuarioDAO($con->getConexao());

if($usuarioDAO->cadastrar($user)){ 
	header("Location: ../viewSistem/index.php");
}else{
	$msg = \PDO::errorInfo($con->getConexao());
?>

	<p class="text-danger">O Banco <?= $user->getNick()?> não foi cadastrado : <?= $msg ?></p>
	<?php
	}
	?>
<?php require_once("../view/rodape.php");?>