<?php 
    session_start();
    //destruir sessão
    session_destroy();

    //limpar váriaveis de sessão
    unset($_SESSION["cpf"]);
    unset($_SESSION["senha"]);

    //mandar para o login
    header('location:index.php');

?>