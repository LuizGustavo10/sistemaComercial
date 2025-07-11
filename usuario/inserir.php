<?php
    include "../conexao.php";

    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];

    // echo "Teste $nome $cpf $senha";

    $sql = "INSERT INTO usuario(nome, cpf, senha) VALUES ('$nome','$cpf','$senha')";
    //executar sql
    $resultado = mysqli_query($conexao, $sql);

    //manda a pessoa para a página inicial
    header("Location:../principal.php");

?>