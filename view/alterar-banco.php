<?php 
require_once("cabecalho.php");
require_once("../Conexao/conexao.php");
require_once("../DAO/variavelDAO.php");


$con = new Conexao();
$variavelDAO = new variavelDAO($con->getConexao());

$id = $_GET['id'];
$variaveis = $variavelDAO->buscaVar($id);

?>

    <table class="table">
    <form>
    <?php
    foreach($variaveis as $variavel) : 
            for ($i=0; $i < count($variavel); $i++) :
    ?>
	<input type="hidden" name="id" value="<?=$variavel[$i]->getId()?>">
        <tr>
                   <td>Variável <?=$i+1?></td>
                       <td>
                           <input class="form-control" type="text" name="nome" value="<?=$variavel[$i]->getNome()?>">
                       </td>
                </tr>
                <tr>
                    <td>Valor <?=$i+1?></td>
                    <td>
                        <input class="form-control" type="text" name="valor" value="<?=$variavel[$i]->getValor()?>">
                    </td>
                </tr>
                <?php
                	endfor;
            endforeach;
                ?>
                </form>
    </table>

<?php 
require_once("rodape.php");
?>