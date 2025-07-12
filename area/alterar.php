<?php
    include '../conexao.php';

    //recebendo requisições do front-end e armazendo valores em variáveis
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];


    $sql = "UPDATE area SET nome='$nome' WHERE id='$id' ";

    //executa sql
    $resultado = mysqli_query($conexao, $sql);

    //voltar para tela inicial
    header("Location:../area.php");


?>