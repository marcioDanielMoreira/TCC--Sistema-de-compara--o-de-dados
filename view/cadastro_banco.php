<?php require_once("cabecalho.php");?>
<div class="container">
   <div class="principal">
        <form method="post" action="../actions/adiciona-banco.php">
            <div class="form-group">
                <label for="nomeBanco">Banco</label>
                <input type="text" class="form-control" id="nomeBanco" name="nome" placeholder="Nome do Banco">
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>
    </div>
</div>
<?php require_once("rodape.php");?>
