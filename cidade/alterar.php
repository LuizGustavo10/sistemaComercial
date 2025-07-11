<?php
    include '../conexao.php';

    //recebendo requisições do front-end e armazendo valores em variáveis
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $cep = $_REQUEST['cep'];
    $estado = $_REQUEST['estado'];

    $sql = "UPDATE cidade SET nome='$nome', cep='$cep', estado='$estado' WHERE id='$id' ";

    //executa sql
    $resultado = mysqli_query($conexao, $sql);

    //voltar para tela inicial
    header("Location:../cidade.php");


?>