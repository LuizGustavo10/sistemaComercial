<?php
    include "../conexao.php";

    $nome = $_REQUEST['nome'];
    $cep = $_REQUEST['cep'];
    $estado = $_REQUEST['estado'];

    // echo "Teste $nome $cpf $senha";

    $sql = "INSERT INTO cidade(nome, cep, estado) VALUES ('$nome','$cep','$estado')";
    //executar sql
    $resultado = mysqli_query($conexao, $sql);

    //manda a pessoa para a página inicial
    header("Location:../cidade.php");

?>