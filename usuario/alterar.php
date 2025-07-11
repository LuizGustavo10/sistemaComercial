<?php
    include '../conexao.php';

    //recebendo requisições do front-end e armazendo valores em variáveis
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];

    $sql = "UPDATE usuario SET nome='$nome', cpf='$cpf', senha='$senha' WHERE id='$id' ";

    //executa sql
    $resultado = mysqli_query($conexao, $sql);

    //voltar para tela inicial
    header("Location:../principal.php");


?>