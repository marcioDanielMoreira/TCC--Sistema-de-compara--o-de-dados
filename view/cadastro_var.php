<?php require_once("cabecalho.php");
require_once("../Conexao/conexao.php");
require_once("../DAO/bancoDAO.php");

$con = new Conexao();
$bancoDAO = new bancoDAO($con->getConexao());
$bancos = $bancoDAO->listBanco();

?>
<div class="container">
    <div class="principal">
        <form action="../actions/adiciona-var.php" method="post">
            <table class="table">
                <tr>
                    <td>Banco</td>
                    <td>
                        <select name="idBanco" class="form-control" >
                        <option selected>Selecione o Banco desejado!</option>
                        <?php
                        foreach($bancos as $banco) : 
                            for ($i=0; $i < count($banco); $i++) :
                                $BancoID = $banco[$i]->getId();
                                $selected = $BancoID ? "selected = 'selected'" : "";
                            ?>
                            <option value="<?=$banco[$i]->getId()?>">
                                <?=$banco[$i]->getNome()?>
                            </option>
                        <?php
                        endfor; 
                        endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                   <td>Variável</td>
                       <td>
                           <input class="form-control" type="text" name="nome">
                       </td>
                </tr>
                <tr>
                    <td>Valor</td>
                    <td>
                        <input class="form-control" type="text" name="valor">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php require_once("rodape.php");?>