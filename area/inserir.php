<?php
    include "../conexao.php";

    $nome = $_REQUEST['nome'];

    // echo "Teste $nome $cpf $senha";

    $sql = "INSERT INTO area(nome) VALUES ('$nome')";
    //executar sql
    $resultado = mysqli_query($conexao, $sql);

    //manda a pessoa para a página inicial
    header("Location:../area.php");

?>