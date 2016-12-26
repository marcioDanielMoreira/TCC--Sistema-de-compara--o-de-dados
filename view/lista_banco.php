<?php require_once("cabecalho.php"); 
require_once("../Conexao/conexao.php");
require_once("../DAO/bancoDAO.php");

$con = new Conexao();
$bancoDAO = new bancoDAO($con->getConexao());
$bancos = $bancoDAO->listBanco();
?>
<div class="container">
    <div class="principal">
        <table class="table table-striped table-bordered">
        <?php
        foreach($bancos as $banco) : 
            for ($i=0; $i < count($banco); $i++) :
        ?>
            <tr>
                <td><?=$banco[$i]->getNome()?></td>
                <td>
                    <a class="btn btn-primary" href="alterar-banco.php?id=<?=$banco[$i]->getId()?>">ALTERAR</a>
                </td> 
                <td>
                    <form action="../actions/remove-banco.php" method="post">
                        <input type="hidden" name="id" value="<?=$banco[$i]->getId()?>">
                        <button class="btn btn-danger">EXCLUIR</button>
                    </form>
                </td>    
            </tr>
            <?php
            endfor;
            endforeach; 
            ?>
        </table>
    </div>
</div>
<?php require_once("rodape.php"); ?>

