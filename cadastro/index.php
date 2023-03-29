<?php
     session_start();
     include("../conexao.php");
     include("../cliente.php");   
?>
<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <?php

        # Flags de erros de cadastro

        if(isset($_SESSION['dados_incompletos'])){
            echo "<p>Por favor, preencha todos os campos.</p>";
            unset($_SESSION['dados_incompletos']);
        }
        if(isset($_SESSION['senha_errada'])){
            echo "<p>As senhas devem ser iguais.</p>";
            unset($_SESSION['senha_errada']);
        }
        if(isset($_SESSION['email_existe'] )){
            echo "<p>O e-mail digitado já foi cadastrado. Por favor digite outro endereço de e-mail.</p>";
            unset($_SESSION['email_existe'] );
        }
        if(isset($_SESSION['erro_inesperado'])){
            echo "<p>Um erro inesperado ocorreu. Por favor, tente se cadastrar novamente mais tarde.</p>";
            unset($_SESSION['erro_inesperado']);
        }
        #Fim das flags de erros de cadastro
    ?>
    <form action="cadastrar.php" method="post">
        <h1>Informações pessoais</h1>
        Nome: <input type="text" name="nome" id="nome">
        Email: <input type="email" name="email" id="email">
        Senha: <input type="password" name="password" id="password">
        Confirmar Senha: <input type="password" name="password-confirm" id="password-confirm">
        Telefone: <input type="text" name="telefone" id="telefone">
        <input type="submit" value="Prosseguir">
    </form>
</body>
</html>