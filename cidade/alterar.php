<?php
include '../conexao.php';

// recebendo valores do formulário
$id = $_REQUEST['id'];
$nome = $_REQUEST['nome'];
$cep = $_REQUEST['cep'];
$estado = $_REQUEST['estado'];
$regiao_id = $_REQUEST['regiao_id']; // <-- Novo campo

// comando de atualização incluindo regiao_id
$sql = "UPDATE cidade 
        SET nome='$nome', cep='$cep', estado='$estado', regiao_id='$regiao_id' 
        WHERE id='$id'";

// executa SQL
$resultado = mysqli_query($conexao, $sql);

// redireciona de volta à tela principal
header("Location:../cidade.php");
?>