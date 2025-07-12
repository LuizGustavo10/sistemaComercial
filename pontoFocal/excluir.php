<?php

    include '../conexao.php';

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM ponto_focal WHERE id='$id' ";

    $resultado = mysqli_query($conexao, $sql);

    header("Location:../ponto_focal.php");

?>