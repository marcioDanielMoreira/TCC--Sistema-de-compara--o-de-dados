<?php
require_once("../Conexao/conexao.php");
require_once("../DAO/variavelDAO.php");
require_once("../DAO/UsuarioDAO.php");
require_once("../Classes/Usuario.php");
require_once("../Classes/Variavel.php");
require_once("../actions/logica-user.php");

verificaUsuario();
$con = new Conexao();
$variavelDAO = new variavelDAO($con->getConexao());
$usuarioDAO = new UsuarioDAO($con->getConexao());
$user = $usuarioDAO->busca(usuarioLogado());
$variaveis = $variavelDAO->listaResultadoParaDownload($user[0]->getId());

function outputCsv($fileName, $assocDataArray)
{
    ob_clean();
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=' . $fileName);    
    if(isset($assocDataArray['0'])){
        $fp = fopen('php://output', 'w');
        fputcsv($fp, array_keys($assocDataArray[0]));
        foreach($assocDataArray AS $values){
            fputcsv($fp, $values);
        }
        fclose($fp);
    }
    ob_flush();
}

$variavelDAO->deletaSaidaUser($user[0]->getId());
$variavelDAO->deletaVentUser($user[0]->getId());
outputCsv($user[0]->getEmail(). date('d-m-Y').".csv", $variaveis);
die();
?>