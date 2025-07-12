<?php
    include "../conexao.php";

    $nome = $_REQUEST['nome'];
    $cep = $_REQUEST['cep'];
    $estado = $_REQUEST['estado'];
    $regiao = $_REQUEST['regiao_id'];

    // echo "Teste $nome $cpf $senha";

    $sql = "INSERT INTO cidade(nome, cep, estado, regiao) VALUES ('$nome','$cep','$estado', '$regiao')";
    //executar sql
    $resultado = mysqli_query($conexao, $sql);

    //manda a pessoa para a página inicial
    header("Location:../cidade.php");

?>