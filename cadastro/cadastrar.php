<?php
    # Arquivo responsável por validar o casdastro

    session_start();
    include_once("../cliente.php");
    include('../conexao.php'); # Importa os dados da conexão

    # Verifica se os campos foram preenchidos,
    # Caso não forem, redireciona o usuário para a página de cadastro
    if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['nome']) || empty($_POST['telefone']) || empty($_POST['password-confirm'])){
        $_SESSION['dados_incompletos'] = true;
        header("Location: index.php");
    }else{
        # Declaração das variáveis

        # Para evitar ataque de mysql injection
        # Todas as variáveis passam pela função mysqli_real_escape_string()

        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
        $datareg = date("Y-m-d");

        # As senhas são criptografadas em md5
        $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['password'])));
        $confirmaSenha = mysqli_real_escape_string($conexao, trim(md5($_POST['password-confirm']))); 

        # Fim da declaração das variáveis

        # Verifica se as senhas conhecidem,
        # Caso não conhecidam, redireciona para a página de cadastro
        if($senha != $confirmaSenha){

        $_SESSION['senha_errada'] = true; # Informa o usuário que as senhas não se conhecidem
        header('Location: index.php');
        exit;
        }
        # Fim da verificação das senhas

        # Verifica se o email já foi cadastrado no banco

        $sql = "select count(*) as total from cli where email_cli = '$email'";  # conta o total de registros no banco como "total" onde os emails forem iguais ao email enviado pelo cliente
        $result = mysqli_query($conexao, $sql); # Armazena o resultado da consulta mysql
        $row = mysqli_fetch_assoc($result); # Armazea o numero de linhas encontradas no resultado anterior

        # Como o email foi marcado no banco como sendo unique, só a necessidade de verificar se ele encontrou um único registro com o mesmo email

        if($row['total'] == 1){

            $_SESSION['email_existe'] = true; # Informa o usuário que o email já foi cadastrado
            header('Location: index.php'); # Redireciona ele para a página de cadastro
            exit;
        }
        # Fim da verificação de email

        # Início do cadastro do cliente no banco

        # Comando mysql que fará o cadastro
        # O status da conta foi definido para "4", o que indica que ainda falta para o usuário cadastrar os seus gostos e endereço.
        $sql = "INSERT INTO `cli`(`telefone_cli`, `status_conta_cli`, `email_cli`, `senha_cli`, `data_reg_cli`, `nome_cli`) VALUES ('$telefone', '4','$email','$senha','$datareg', '$nome')";

        # Tentativa de cadastrar o usuário no banco
        if($conexao->query($sql) === TRUE){

        # Cria o objeto cliente e o armazena na sessão
        $cliente = new cliente; # Objeto importado na linha 5
        $cliente -> dataRes = $datareg;
        $cliente -> telefone = $telefone;
        $cliente -> nome = $nome;
        $cliente -> emailSetter($email);
        $cliente -> passwordSetter($senha);
        $cliente -> statusConta = "4";
        $_SESSION['cliente'] = $cliente;

        # Fecha a conexão e redireciona o usuário para a próxima etapa do cadastro
        $conexao -> close();
        header('Location: gostos.php');
        exit;
        }
        else{

        $_SESSION['erro_inesperado'] = true; # Informa o usuário que ocorreu um erro inesperado
        header('Location: index.php');
        }

        #Fim do cadastro
    }
?>