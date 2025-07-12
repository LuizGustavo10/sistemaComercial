<?php

    include '../conexao.php';

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM compra_area WHERE id='$id' ";

    $resultado = mysqli_query($conexao, $sql);

    header("Location:../ultimasVendas.php");

?>