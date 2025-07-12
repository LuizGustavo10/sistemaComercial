<?php

    include '../conexao.php';

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM area WHERE id='$id' ";

    $resultado = mysqli_query($conexao, $sql);

    header("Location:../area.php");

?>