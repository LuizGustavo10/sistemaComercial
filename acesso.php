<?php
    //importando conexão do banco de dados
    include 'conexao.php';
  

    //recebendo dados da tela de login(front) por requisição
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];
    

    echo "Seu cpf é: $cpf </br> Sua senha é $senha";

    //consultar o cpf e senha no banco de dados
    $sql = "SELECT * FROM usuario WHERE cpf='$cpf' AND senha='$senha' ";

    //executa o código SQL com a permissão da conexão
    $resultado = mysqli_query($conexao, $sql);

    //cada valor é associado ao nome da coluna no banco
    $colunas = mysqli_fetch_assoc($resultado);

    //se o numero de linhas buscadas no banco for maior que zero
    if(mysqli_num_rows($resultado) > 0){
        
        //iniciar a sessão
        session_start();

        //cria váriaveis de sessão usuario, cpf e senha
        $_SESSION["usuario"] = $colunas["nome"];
        $_SESSION["cpf"] = $cpf;
        $_SESSION["senha"] = $senha;

        //direciona para página do sistema
        header('location: principal.php');
    }else{
        //destruir sessão
        session_unset();
        session_destroy();

        echo "Login Errado! invasor !";
        header("location: index.php");
        
    }



?>