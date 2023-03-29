<?php
    session_start();
    include("../conexao.php");
    include("../cliente.php");
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
    <?php
        # Flags de erro de login

        if(isset($_SESSION['incompleto'] )){
            echo "<p>Por favor preencha todos os campos.</p>";
            unset($_SESSION['incompleto'] );
        }
        if(isset($_SESSION['nao_autenticado'])){
            echo "<p>Senha ou email incorretos.</p>";
            unset($_SESSION['nao_autenticado']);
        }
        # Fim das flags de erro de login
    ?>
    <a href="../cadastro/index.php">Casdastrar</a>
    <form action="login.php" method="POST">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" autocomplete="off">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" placeholder="Digite a sua Senha">
        <input type="submit" value="Login">
    </form>
</body>
</html>