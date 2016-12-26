<?php require_once("cabecalho.php"); ?>
    <div class="container principal">
        <div class="card"></div>
        <div class="card">
            <h1 class="title">Bem Vindo!</h1>
            <form action="../actions/login.php" method="post">
                <div class="input-container">
                    <input type="email" id="email" name="email" required="required">
                    <label for="login">Email</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="password" id="senha" name="senha" required="required">
                    <label for="senha">Senha</label>
                    <div class="bar"></div>
                </div>
                <div class="button-container">
                    <button type="submit" value="entrar" id="entrar" name="entrar">
                        <span>Entrar</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="card alt">
            <div class="toggle" title="FAÇA SEU CADASTRO!"></div>
            <h1 class="title">se cadastre!<div class="close"></div></h1>
            <form id="cadastro" action="../actions/cadastroUsuario.php" method="post">
                <div class="input-container">
                    <input type="email" id="email" name="email" required="required">
                    <label for="login">Email</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="password" id="senha" name="senha" required="required">
                    <label for="senha">Senha</label>
                    <div class="bar"></div>
                </div>
                <div class="button-container">
                    <button type="submit" value="cadastro" name="cadastro" id="cadastro">
                        <span>cadastrar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php require_once("rodape.php"); ?>
   