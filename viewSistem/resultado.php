<?php require_once("cabecalho.php"); 
require_once("../Conexao/conexao.php");
require_once("../DAO/variavelDAO.php");
require_once("../DAO/UsuarioDAO.php");
require_once("../actions/logica-user.php");

verificaUsuario();
$con = new Conexao();
$variavelDAO = new variavelDAO($con->getConexao());
$usuarioDAO = new UsuarioDAO($con->getConexao());
$user = $usuarioDAO->busca(usuarioLogado());
$variaveis = $variavelDAO->listaResultado($user[0]->getId());

?>
   <div class="container principal">
       <div class="card"></div>
       <div class="card">
           <h1 class="title">RESULTADOS<a href="../actions/logout.php" id="logout"><div class="closeRed" title="Sair"></div></a></h1>
         
                <table class="tabela" id="playlistTable">
                    <thead>
                        <tr>
                            <th>PARAMETRO</th>
                            <th>VALOR</th>
                            <th>RETORNO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                         foreach($variaveis as $variavel) : 
                           for ($i=0; $i < count($variavel); $i++) :
                            ?>
                        <tr>
                            <td><?=$variavel[$i]->getNome()?></td>
                            <td><?=$variavel[$i]->getValor()?></td>
                            <td><?=$variavel[$i]->getStatus()?></td>
                        </tr>
                       <?php
                       endfor;
                       endforeach;
                       ?>
                    </tbody>
                </table>
           
          
                <div class="button-container">
                    <a href="../actions/download.php"><button type="submit" value="entrar" id="entrar" name="entrar">
                        <span>DOWNLOAD</span>
                    </button></a>
                </div>
       </div>
   </div>
<?php require_once("rodape.php"); ?>