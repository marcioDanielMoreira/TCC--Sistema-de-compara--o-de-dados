<?php require_once("cabecalho.php"); 
require_once("../Conexao/conexao.php");
require_once("../DAO/bancoDAO.php");
require_once("../actions/logica-user.php");
    
verificaUsuario();

$con = new Conexao();
$bancoDAO = new bancoDAO($con->getConexao());
$bancos = $bancoDAO->listBanco();

?>
   <div id="loader" class="loader"></div>
   <div style="display:none" id="tudo_page">
    <div class="container principal">
        <div class="card"></div>
        <div class="card">
            <h1 class="title">enviar arquivo<a href="../actions/logout.php" id="logout"><div class="closeRed" title="Sair"></div></a></h1>
            <form action="../actions/readCSV.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="input-container">
                   <input id="uploadFile" placeholder="Escolha o arquivo" disabled="disabled">
                </div>
                <div class="input-file">
                    <input type="file" id="uploadBtn" name="file">
                    <label for="uploadBtn" class="fileUp">upload</label>
                </div>
                <div class="select">
                    <select name="idBanco">
                        <option selected>Bancos</option>
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
                </div>
                <div class="button-container">
                    <button type="submit" value="entrar" id="entrar" name="entrar">
                        <span>enviar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once("rodape.php"); ?>