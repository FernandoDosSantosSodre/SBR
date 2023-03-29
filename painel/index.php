<?php
    include_once('../cliente.php');
    include_once("../loginChecker.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Busca de Restaurantes</title>
</head>
<body>
    <pre>
        <?php
            print_r($_SESSION["cliente"]);
            echo $_SESSION["cliente"]->nome;
        ?>
    </pre>
    <p>Você está logado</p>
    <a href="../login/logout.php">Sair</a>
</body>
</html>