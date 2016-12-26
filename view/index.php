<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>ADMIN</title>
    <link rel="shortcut icon" href="../img/database.png">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/normalize.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/ajustes.css">
</head>
<body>
    <div class="container">
        <div class="principal">
            <form action="../actions/loginadm.php" method="post">
                <div class="form-group">
                   <label for="login">Email</label>
                    <input class="form-control" type="email" id="email" name="email" required="required" >
                    <label for="senha">Senha</label>
                    <input class="form-control" type="password" id="senha" name="senha" required="required" >
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>